<?php

namespace App\Http\Controllers\site\salonDetails;
use App\Http\Controllers\Controller;
use App\Model\Image;
use App\Model\SalonReview;
use App\Model\Service;
use App\Model\ServiceList;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class salonDetailsController extends Controller
{
    public function index($id)
    {
        $item =  User::findOrFail($id);
        if ($item->user_type_id != 1 || $item->status != 1 ){
            abort(404);
        }
        $rates=SalonReview::where('status','1')->where('salon_id',$item->id)->get();
        $serviceList=ServiceList::get();
        $salonImages=Image::where('salon_id',$id)->get();
        $footerSlider = User::where('user_type_id',1)->where('status',1)->get();
        return view('site.salonDetails.salon', compact('item', 'footerSlider', 'rates', 'serviceList', 'salonImages'));
    }

    public function AddRateSalon(Request $request , $id)
    {
        User::findOrFail($id);
        if (auth()->check()) {
            $data = $request->validate([
                'reviews_rate' => 'required|integer',
                'reviews_text' => 'required|string',
            ]);
            $data['user_id'] = auth()->user()->id;
            $data['salon_id'] = $id;
            $data['status'] = 0;
            SalonReview::create($data);
            return redirect()->back()->with('success', trans('web.youRating'));

        }else{
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'reviews_rate' => 'required|integer',
                'reviews_text' => 'required|string',
            ]);
            $data['salon_id'] = $id;
            $data['status'] = 0;
            SalonReview::create($data);
            return redirect()->back()->with('success', trans('web.youRating'));
        }
    }
    public function ServiceDetails(Request $request,$id)
    {
        $data = $request->validate([
            'service_id' => 'required|integer',
            'service_list_id' => 'required|integer',
        ]);
        $salonID = $id;
        $service = Service::where('salon_id',$salonID)->where('id',$data['service_id'])->where('status',1)->where('service_list_id',$data['service_list_id'])->first();

        $view = view('site.components.panels.salonServicePopUpDetails', compact('service','salonID'))->render();
        return response()->json(['html' => $view],200);
    }
}
