<?php

namespace App\Http\Controllers\site\profile;

use App\Http\Controllers\Controller;
use App\Model\Image;
use App\Model\Reservation;
use App\Model\Service;
use App\Model\ServiceList;
use App\Model\Team;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->User();

        if ($user->user_type_id == 0) {
            $user = auth()->User();
            $reservations = Reservation::where('user_id',$user->id)->get();
            return view('site.profile.user.index', compact('user','reservations'));
        } elseif ($user->user_type_id == 1) {
            $reservations = Reservation::where('salon_id',$user->id)->get();
            $images = Image::where('salon_id', $user->id)->get();
            return view('site.profile.salon.index', compact('user', 'images','reservations'));
        }
    }

    public function ChangeReservationStatus(Request $request)
    {
        $user = auth()->User();
        $data = $request->validate([
            'id' => 'required|integer',
            'status' => 'required|integer',
        ]);
        if ($user->user_type_id == 1) {
            $reservations = Reservation::where('salon_id',$user->id)->where('id',$data['id'])->first();
            if ($reservations && $reservations->status == 0){
                $reservations->update($data);
                return response()->json(true,200);
            }
        }else {
            abort(404);
        }



    }
    public function UpdateProfile(Request $request)
    {
        $user = auth()->User();
        if ($user->user_type_id == 0) {
            return $this->UpdateUserProfile($request, $user);
        } elseif (auth()->User()->user_type_id == 1) {
            return $this->UpdateSalonProfile($request, $user);
        }
    }

    public function UpdateUserProfile($request, $user)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'date_of_birth' => 'sometimes|nullable|date',
            'city' => 'sometimes|nullable|string',
            'user_image' => 'sometimes|nullable|image',
            'first_phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,first_phone,' . $user->id,
        ]);
        $request->hasFile('user_image') ? $data['user_image'] = $this->storeFile($request->user_image, 'user_images') : '';
        $user->update($data);
        return redirect()->back()->with('success', trans('web.yourData'));

    }

    public function UpdateSalonProfile($request, $user)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'salon_name' => 'required|string',
            'salon_image' => 'sometimes|nullable|image',
            'salon_license' => 'sometimes|nullable|image',
            'first_phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,first_phone,' . $user->id,
            'second_phone' => 'sometimes|nullable|regex:/(01)[0-9]{9}/',
            'third_phone' => 'sometimes|nullable|regex:/(01)[0-9]{9}/',
            'salon_payment_method_online_payment' => 'sometimes|nullable|integer',
            'salon_payment_method_cash' => 'sometimes|nullable|integer',
            'salon_payment_method_promotions' => 'sometimes|nullable|integer',
            'salon_payment_method_promotion_value' => 'sometimes|nullable|integer',
        ]);

        $request->salon_payment_method_online_payment  == 1 ? $data['salon_payment_method_online_payment'] = '1'  : $data['salon_payment_method_online_payment'] = '0';
        $request->salon_payment_method_cash == 1 ? $data['salon_payment_method_cash'] = '1'  : $data['salon_payment_method_cash'] = '0';
        $request->salon_payment_method_promotions == 1 ? $data['salon_payment_method_promotions'] = '1'  : $data['salon_payment_method_promotions'] = '0';

        $request->hasFile('salon_image') ? $data['salon_image'] = $this->storeFile($request->salon_image, 'salon_images') : '';
        $request->hasFile('salon_license') ? $data['salon_license'] = $this->storeFile($request->salon_license, 'salon_licenses') : '';
        $user->update($data);
        return redirect()->back()->with('success', trans('web.yourData'));
    }

    public function UpdateSalonBankDetails(Request $request)
    {
        $user = auth()->User();
        $data = $request->validate([
            'first_bank_account_name' => 'required|string',
            'first_bank_account_number' => 'required|integer',
            'second_bank_account_name' => 'sometimes|nullable|string',
            'second_bank_account_number' => 'sometimes|nullable|integer',
        ]);
        $user->update($data);
        return redirect()->back()->with('success', trans('web.yourBank'));

    }

    public function UpdateSalonLocation(Request $request)
    {
        $user = auth()->User();
        $data = $request->validate([
            'location_address' => 'required|string',
            'location_lat' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'location_long' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
        ]);
        $user->update($data);
        return redirect()->back()->with('success', trans('web.siteData'));

    }
    public function UpdateUserLocation(Request $request)
    {
        $user = auth()->User();
        $data = $request->validate([
            'location_address' => 'required|string',
            'location_lat' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'location_long' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
        ]);
        $user->update($data);
        return redirect()->back()->with('success', trans('web.siteData'));
    }


    public function UpdateSallonAppointments(Request $request)
    {
        $user = auth()->User();
        $times = $request->validate([
            'saturday_from' => 'sometimes|nullable|date_format:H:i',
            'saturday_to' => 'sometimes|nullable|date_format:H:i',
            'sunday_from' => 'sometimes|nullable|date_format:H:i',
            'sunday_to' => 'sometimes|nullable|date_format:H:i',
            'monday_from' => 'sometimes|nullable|date_format:H:i',
            'monday_to' => 'sometimes|nullable|date_format:H:i',
            'tuesday_from' => 'sometimes|nullable|date_format:H:i',
            'tuesday_to' => 'sometimes|nullable|date_format:H:i',
            'wednesday_from' => 'sometimes|nullable|date_format:H:i',
            'wednesday_to' => 'sometimes|nullable|date_format:H:i',
            'thursday_from' => 'sometimes|nullable|date_format:H:i',
            'thursday_to' => 'sometimes|nullable|date_format:H:i',
            'friday_from' => 'sometimes|nullable|date_format:H:i',
            'friday_to' => 'sometimes|nullable|date_format:H:i',
        ]);
        $data['salon_appointments'] = json_encode($times);
        $user->update($data);
        return redirect()->back()->with('success', trans('web.appointmentsModified'));

    }


    public function UpdatePassword(Request $request)
    {
        $user = auth()->User();
        if (Hash::check($request->old_password, $user->password)) {
            $data = $request->validate([
                'password' => 'required|min:6|confirmed',
            ]);
            $data['password'] = Hash::make($request->password);
            $user->update($data);
            return redirect()->back()->with('success', trans('web.passwordChanged'));

        } else {
            return redirect()->back()->with('error', trans('web.theOldPass'));
        }
    }


    public function StoreSalonImage(Request $request)
    {
        $user = auth()->User();
        if ($request->image) {
            $data['name'] = $request->file('image')->getClientOriginalName();
            $data['path'] = $this->storeFile($request->image, 'salon_images');
        }
        $data["salon_id"] = $user->id;
        $image = Image::create($data);
        return response()->json($image->id, 200);
    }

    public function Delete0SalonImage(Request $request)
    {
        $user = auth()->User();
        $image = Image::where('id', $request->image_id)->where('salon_id', $user->id)->first();
        if ($image) {
            Storage::delete($image->path);
            $image->delete();
            return response()->json(true, 200);
        }
        return response()->json(false, 401);
    }

    public function ServiceDetails(Request $request)
    {
        $data = $request->validate([
            'service_id' => 'required|integer',
            'service_list_id' => 'required|integer',
        ]);
        $user = auth()->User();
        $service = Service::where('salon_id',$user->id)->where('id',$data['service_id'])->where('service_list_id',$data['service_list_id'])
            ->first();


        $view = view('site.components.panels.salonProfilePopUpDetails', compact('service'))->render();
        return response()->json(['html' => $view],200);
    }
    public function DeleteTeamMember(Request $request)
    {
        $data = $request->validate([
            'team_id' => 'required|integer',
        ]);
        $user = auth()->User();

        $service = Team::where('salon_id',$user->id)
            ->where('id',$data['team_id'])
            ->first();

        if ($service){
            $service->delete();
            return response()->json(true,200);
        }else{
            return response()->json(false,404);
        }

    }

    public function DeleteService(Request $request)
    {
        $data = $request->validate([
            'service_id' => 'required|integer',
        ]);
        $user = auth()->User();

        $service = Service::where('salon_id',$user->id)
            ->where('id',$data['service_id'])
            ->first();

        if ($service){
            $service->delete();
            return response()->json(true,200);
        }else{
            return response()->json(false,404);
        }
    }

    public function AddTeamMember(Request $request)
    {
        return view('site.profile.salon.tabs.service.team.create');
    }

    public function StoreMember(Request $request , $service_id , $serviceList_id)
    {
        $user = auth()->User();
        $service = Service::findOrFail($service_id);
        $service_list = ServiceList::findOrFail($serviceList_id);
        if ($service->salon_id != $user->id){
            abort(404);
        }
        $data = $request->validate([
            'name_ar' => 'sometimes|nullable|string',
            'name_en' => 'sometimes|nullable|string',
            'job_title_ar' => 'sometimes|nullable|string',
            'job_title_en' => 'sometimes|nullable|string',
            'image' => 'sometimes|nullable|image',
            'excerpt_ar' => 'sometimes|nullable|string',
            'excerpt_en' => 'sometimes|nullable|string',
            'status_team' => 'sometimes|nullable|integer'
        ]);
            $data['salon_id']=$user->id;
            $data['service_id'] = $service_id;
            $data['service_list_id'] = $serviceList_id;
        if ($request->hasFile('image') && request()->has('image')) {
            $data['image'] = $this->storeFile($request->image);
        }
        Team::create($data);
        return redirect()->back()->with('success', trans('web.categoryHaveBeenCreatedSuccessfully'));
    }

    public function editMember($id)
    {
        $team= Team::findorfail($id);
        return view('site.profile.salon.tabs.service.team.edit', compact('team'));
    }

    public function updateMember(Request $request, $id ,$service_id, $serviceList_id)
    {
        $user = auth()->User();
        $service = Service::findOrFail($service_id);
        $service_list = ServiceList::findOrFail($serviceList_id);
        if ($service->salon_id != $user->id) {
            abort(404);
        }
        $team = Team::findorfail($id);
        $data = $request->validate([
            'name_ar' => 'sometimes|nullable|string',
            'name_en' => 'sometimes|nullable|string',
            'job_title_ar' => 'sometimes|nullable|string',
            'job_title_en' => 'sometimes|nullable|string',
            'image' => 'sometimes|nullable|image',
            'excerpt_ar' => 'sometimes|nullable|string',
            'excerpt_en' => 'sometimes|nullable|string',
            'status_team' => 'sometimes|nullable|integer'
        ]);
        $data['salon_id'] = $user->id;
        $data['service_id'] = $service_id;
        $data['service_list_id'] = $serviceList_id;
        if ($request->hasFile('image') && request()->has('image')) {
            $data['image'] = $this->storeFile($request->image);
        }
        $team->update($data);
        return redirect()->back()->with('success', trans('web.categoryHaveBeenCreatedSuccessfully'));
    }


    public function chat(Request $request)
    {
        return view('site.profile.salon.tabs.chats.index');
    }
}
