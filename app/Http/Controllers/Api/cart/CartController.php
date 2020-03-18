<?php

namespace App\Http\Controllers\Api\cart;

use App\Http\Controllers\Controller;

use App\Http\Resources\profile\salon\SalonGeneralSettingsResource;
use App\Http\Resources\salon\SalonInfoResource;
use App\Http\Resources\salon\SalonServiceResource;
use App\Http\Resources\salon\SalonTeamResource;
use App\Http\Resources\serviceList\ServiceListResource;
use App\Model\Cart;
use App\Model\Service;
use App\Model\ServiceList;
use App\Model\Team;
use App\Model\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{

    public function index()
    {
        $user = auth()->User();
        $carts = Cart::where('user_id', $user->id)->get();
       if (count($carts) > 0){
           return $this->apiResponse( $carts, false, '', 200);
       }else{
           $message = 'لا يوجد حجوزات ف السله';
           return $this->apiResponse(null, true, $message, 401);
       }
    }



    public function addToCart($SalonID, $ServiceID, $TeamID)
    {
        $user = auth()->User();
        $team = Team::where('id', $TeamID)->where('salon_id', $SalonID)->where('service_id', $ServiceID)->where('status', 1)->first();
        $salon = User::where('id', $SalonID)->where('status', 1)->where('user_type_id', 1)->first();
        $service = Service::where('id', $ServiceID)->where('salon_id', $SalonID)->where('status', 1)->first();
        if ($team && $salon && $service && $user->user_type_id == 0) {
            $carts = Cart::where('user_id', $user->id)->pluck('salon_id')->toArray();
            if (count($carts) > 0) {
                if (!in_array($SalonID, $carts)) {
                    $message = 'لا يمكنك الحجز في اكثر من صالون في حجز واحد ... برجاء مراجعه الحجوزات';
                    return $this->apiResponse(null, true, $message, 401);
                }
            }
            $data = [
                'user_id' => $user->id,
                'salon_id' => $salon->id,
                'service_id' => $service->id,
                'team_id' => $team->id,
                'price' => $service->price,
                'status' => 0,
            ];
            $cart = Cart::updateOrCreate($data);
            $message = 'تم الاضافه للسله بنجاح';
            return $this->apiResponse( $cart, false, $message, 200);
        }
        $message = 'برجاء التأكد بأن الفريق او الخدمه ينتمي للصالون';
        return $this->apiResponse(null, true, $message, 401);
    }



    public function destroy($id)
    {
        $user = auth()->User();
        $cart = Cart::where('user_id', $user->id)->where('id', $id)->first();
        if ($cart) {
            $cart->delete($cart);
            $message = 'تم الحذف من السله بنجاح';
            return $this->apiResponse( $cart, false, $message, 200);
        }else{
            $message = 'Cart Id Not Found';
            return $this->apiResponse(null, true, $message, 401);
        }
    }


}
