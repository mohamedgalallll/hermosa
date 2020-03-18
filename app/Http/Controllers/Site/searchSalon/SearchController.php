<?php

namespace App\Http\Controllers\site\searchSalon;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
//        $items = User::where('user_type_id', 1)->where('status', 1)->latest()->get();
//        return view('site.salons.searchPage', compact('items'));
    }

    public function salons(Request $request)
    {

        $countPerPage = $request->paginateCount ? $request->paginateCount : 10;
        $urlServiceList = isset($request->serviceList) ? $request->serviceList : null;
        $servicesList = isset($request->servicesList) ? $request->servicesList : null;

        $salon_payment_method_online_payment = isset($request->salon_payment_method_online_payment) ? $request->salon_payment_method_online_payment : null;
        $salon_payment_method_promotions = isset($request->salon_payment_method_promotions) ? $request->salon_payment_method_promotions : null;
        $salon_payment_method_cash = isset($request->salon_payment_method_cash) ? $request->salon_payment_method_cash : null;
        $rate = isset($request->rate) ? $request->rate : null;
        $min = $request->min;
        $max = $request->max;
        if (request()->ajax()) {

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
            $view = view('site.components.salons.salonFilterItem', compact('items'))->render();
            return response()->json(['html' => $view]);
        } else {

            $smallestValue = \App\Model\Service::where('status', '1')->min('price') > 0 ?  \App\Model\Service::where('status', '1')->min('price') :  0;
            $biggestValue  = \App\Model\Service::where('status', '1')->max('price') > 0 ?  \App\Model\Service::where('status', '1')->max('price') :  1000;


            $q = User::leftJoin('services', 'users.id', '=', 'services.salon_id')
                ->where(function ($q) use ($smallestValue, $biggestValue) {
                    $q->where('services.price', '>=', $smallestValue)->where('services.price', '<=', $biggestValue);
                })
                ->where(function ($q) use ($urlServiceList) {
                    $q->when($urlServiceList, function ($q, $urlServiceList) {
                        return $q->Where('services.service_list_id', $urlServiceList);
                    });
                })
                ->where('users.status', '1')
                ->where('users.user_type_id', '1')
                ->orderBy('users.id', 'DESC')
                ->select('users.*')
                ->distinct('users.id')
                ->paginate($countPerPage);
            $items = $q->unique('id');
            return view('site.salons.searchPage', compact('items'));
        }
    }
}
