<?php

namespace App\Http\Controllers\Api\salons;
use App\Http\Controllers\Controller;
use App\Http\Resources\profile\salon\SalonGeneralSettingsResource;
use App\Http\Resources\salon\SalonInfoResource;
use App\Http\Resources\salon\SalonServiceResource;
use App\Http\Resources\salon\SalonTeamResource;
use App\Http\Resources\serviceList\ServiceListResource;
use App\Model\Image;
use App\Model\Service;
use App\Model\ServiceList;
use App\Model\Team;
use App\Model\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SalonsController extends Controller
{
    public function getSalonInfo($id)
    {
        $user = User::where('id', $id)->where('status', 1)->where('user_type_id', 1)->first();
        if (!$user) {
            $message = 'Salon Not Found';
            return $this->apiResponse(null, true, $message, 401);
        }
        return $this->apiResponse(new SalonInfoResource($user) , false, '', 200);
    }
    public function getSalonService($id)
    {
        $user = User::where('id', $id)->where('status', 1)->where('user_type_id', 1)->first();
        $service = Service::where('salon_id',$user->id)->where('status',1)->get();
        if (!$user) {
            $message = 'Salon Not Found';
            return $this->apiResponse(null, true, $message, 401);
        }
        if (count($service) > 0) {
            return $this->apiResponse( SalonServiceResource::collection($service), false, '', 200);
        }else{
            $message = 'No Services For This Salon';
            return $this->apiResponse(null, true, $message, 401);
        }
    }
    public function getSalonTeams($SalonId,$serviceID)
    {
        $user = User::where('id', $SalonId)->where('status', 1)->where('user_type_id', 1)->first();
        $team = Team::where('salon_id',$user->id)->where('status',1)->where('service_id',$serviceID)->get();
        if (!$user) {
            $message = 'Salon Not Found';
            return $this->apiResponse(null, true, $message, 401);
        }
        if (count($team) > 0) {
            return $this->apiResponse( SalonTeamResource::collection($team), false, '', 200);
        }else{
            $message = 'No Teams For This Salon';
            return $this->apiResponse(null, true, $message, 401);
        }
    }




    public function getAllSalonsWithFilter(Request $request)
    {
        $countPerPage = isset($request->paginateCount) ? $request->paginateCount : 10;
        $servicesList = isset($request->servicesList) ? $request->servicesList : null;
        $salon_payment_method_online_payment = isset($request->salon_payment_method_online_payment) && $request->salon_payment_method_online_payment == 1 ? $request->salon_payment_method_online_payment : null;
        $salon_payment_method_promotions = isset($request->salon_payment_method_promotions) && $request->salon_payment_method_promotions == 1  ? $request->salon_payment_method_promotions : null;
        $salon_payment_method_cash = isset($request->salon_payment_method_cash) && $request->salon_payment_method_cash == 1  ? $request->salon_payment_method_cash : null;
        $rate = isset($request->rate) && $request->rate > 0 ? $request->rate : null;
        $min = Service::where('status', '1')->min('price') > 0 ? Service::where('status', '1')->min('price') : 0;
        $max = Service::where('status', '1')->max('price') > 0 ? Service::where('status', '1')->max('price') : 1000;
        $q = User::join('services', 'users.id', '=', 'services.salon_id')->leftJoin('salon_reviews', 'users.id', '=', 'salon_reviews.salon_id')
            ->where(function ($q) use ($min, $max) {
                $q->where('services.price', '>=', $min)->where('services.price', '<=', $max);
            })
            ->where(function ($q) use ($servicesList, $salon_payment_method_online_payment, $salon_payment_method_promotions, $salon_payment_method_cash, $rate) {
                $q->when($servicesList, function ($q, $servicesList) {
                    return $q->WhereIn('services.service_list_id', $servicesList);
                });
                $q->when($salon_payment_method_online_payment, function ($q, $salon_payment_method_online_payment) {
                    return $q->where('users.salon_payment_method_online_payment', $salon_payment_method_online_payment);
                });
                $q->when($salon_payment_method_promotions, function ($q, $salon_payment_method_promotions) {
                    return $q->where('users.salon_payment_method_promotions', $salon_payment_method_promotions);
                });
                $q->when($salon_payment_method_cash, function ($q, $salon_payment_method_cash) {
                    return $q->where('users.salon_payment_method_cash', $salon_payment_method_cash);
                });
                $q->when($rate, function ($q, $rate) {
                    return $q->select(array('users.*',
                        DB::raw('AVG(salon_reviews.reviews_rate) as reviews_rate')
                    ))->where('reviews_rate', '<=', $rate);
//                        return   $q->where('salon_reviews.reviews_rate','AVG' , $rate);
                });

            })
            ->where('users.user_type_id', '1')
//                ->orderByDesc('AVG(salon_reviews.reviews_rate)')
            ->orderBy('reviews_rate', 'DESC')
//                ->orderBy('users.id', 'DESC')
            ->select('users.*')
            ->distinct('users.id')
            ->paginate($countPerPage);

        $items = $q->unique('id');
        return $this->apiResponse(SalonGeneralSettingsResource::collection($items), false, '', 200);
    }
}
