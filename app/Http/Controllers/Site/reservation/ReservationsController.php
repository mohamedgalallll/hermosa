<?php

namespace App\Http\Controllers\site\reservation;

use App\Http\Controllers\Controller;
use App\Http\Resources\profile\user\UserGeneralSettingsResource;
use App\Model\Cart;
use App\Model\Reservation;
use App\Model\Service;
use App\Model\Team;
use http\Client;
use IZaL\Tap\TapBilling;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categories_show', ['only' => 'index', 'show']);
        $this->middleware('permission:categories_add', ['only' => 'store', 'create']);
        $this->middleware('permission:categories_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:categories_delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'payment_method' => 'required|integer',
            'time' => 'required|date_format:H:i',
            'date' => 'required|date',
        ]);
        $user = auth()->User();
        $carts = Cart::where('user_id', $user->id)->get();
        $cartsalonIDS = Cart::where('user_id', $user->id)->pluck('salon_id')->toArray();
        $cartsalonIDS = array_unique($cartsalonIDS);
        if (count($cartsalonIDS) > 1) {
            return redirect('/cart')->with('error', trans('web.youCannot'));
        }
        $salon = \App\Model\User::where('id',$cartsalonIDS[0])->first();
            if ($data['payment_method'] == 1){
                if ($salon->salon_payment_method_cash != 1){
                    return redirect('/cart')->with('error','لم يقم الصالون بتفعيل وسيله الدفع هذه');
                }
            }elseif ($data['payment_method'] == 2){
                if ($salon->salon_payment_method_online_payment != 1){
                    return redirect('/cart')->with('error','لم يقم الصالون بتفعيل وسيله الدفع هذه');
                }
            }elseif ($data['payment_method'] == 3){
                if ($salon->salon_payment_method_promotions != 1 && $salon->salon_payment_method_promotion_value > 0){
                    return redirect('/cart')->with('error','لم يقم الصالون بتفعيل وسيله الدفع هذه');
                }
            }
        $cartServiceIDS = Cart::where('user_id', $user->id)->pluck('team_id', 'service_id')->toArray();
        $reservation_info = [];
        foreach ($cartServiceIDS as $key => $val) {
            $service = Service::findOrFail($key);
            $team = Team::findOrFail($val);
            $serviceArray = [
                'id' => $service->id,
                'name' => $service->name,
                'description' => $service->description,
                'salon_title' => $service->salon_title,
                'name_service_list' => $service->name_service_list,
                'main_image' => $service->main_image,
                'name_ar' => $service->name_ar,
                'name_en' => $service->name_en,
                'description_en' => $service->description_en,
                'description_ar' => $service->description_ar,
                'image' => $service->image,
                'time' => $service->time,
                'price' => $service->price,
                'salon_id' => $service->salon_id,
                'service_list_id' => $service->service_list_id,
            ];
            $teamArray = [
                'id' => $team->id,
                'name' => $team->name,
                'job_title' => $team->job_title,
                'excerpt' => $team->excerpt,
                'salon_title' => $team->salon_title,
                'main_image' => $team->main_image,
                'name_ar' => $team->name_ar,
                'name_en' => $team->name_en,
                'job_title_ar' => $team->job_title_ar,
                'job_title_en' => $team->job_title_en,
                'image' => $team->image,
                'excerpt_ar' => $team->excerpt_ar,
                'excerpt_en' => $team->excerpt_en,
                'salon_id' => $team->salon_id,
                'service_id' => $team->service_id,
                'service_list_id' => $team->service_list_id,
            ];
            $single_reservation_info = [
                'service' => $serviceArray,
                'team' => $teamArray
            ];
            array_push($reservation_info, $single_reservation_info);
        }

        if (count($carts) > 0) {
            $data['user_id'] = $user->id;
            $data['salon_id'] = $cartsalonIDS[0];
            $data['reservation_info'] = json_encode($reservation_info);
            $data['client_info'] = json_encode(new UserGeneralSettingsResource($user));
            $data['total_price'] = $carts->sum('price');
            $data['payment_status'] = 0;
            $data['status'] = 0;
            $percentage = $salon->salon_payment_method_promotion_value;
            $totalWidth = $data['total_price'];
            $data['paid_part'] = ($percentage / 100) * $totalWidth;;
            $reservations = Reservation::create($data);
            if ($request->payment_method == 2){
                $charges = $this->pay($request,$user,$reservations->id,$reservations->total_price);
                $charge = json_decode($charges,true);
                if ($charge['status']){

                    if ($charge['status'] == 'INITIATED'){
                        $pay['payment_id'] = $charge['id'];
                        $reservations->update($pay);
                        return   redirect($charge['transaction']['url']);
                    }else{
                        return redirect('/')->with('error', 'برجاء التأكد من البيانات المدخله ف الحساب مثل رقم الهاتف والاسم');
                    }
                }
            }elseif ($request->payment_method == 3){
                $charges = $this->pay($request,$user,$reservations->id,$data['paid_part']);
                $charge = json_decode($charges,true);
                if ($charge['status']){
                    if ($charge['status'] == 'INITIATED'){
                        $pay['payment_id'] = $charge['id'];
                        $reservations->update($pay);
                       return redirect($charge['transaction']['url']);
                    }else{
                        return redirect('/')->with('error', 'برجاء التأكد من البيانات المدخله ف الحساب مثل رقم الهاتف والاسم');
                    }
                }
            }
            $carts = Cart::where('user_id', $user->id)->delete();
            return redirect('/')->with('success', 'تم الحجز بنجاح , سيتم تأكيد الحجز من قبل الصالون والتواصل معكم');
        }
    }
    public function payCallBack(Request $request){
        $tapID = $request->tap_id;
        $chargeInfo = $this->getCharges($tapID);
        $charge = json_decode($chargeInfo);
        $response = $charge->response;
        $metadata = $charge->metadata;
        if (auth()->User()->id != $metadata->userID){
            abort(404);
        }

        $reservations = Reservation::where('id',$metadata->orderID)->where('user_id',$metadata->userID)->where('payment_id',$charge->id)->first();
        if ($reservations){
            if ($charge->status == 'CAPTURED' && $response->code == '000'){
                $data['payment_status'] = 1;
                $reservations->update($data);
                $carts = Cart::where('user_id', $metadata->userID)->delete();
                return redirect('/')->with('success', 'تم الحجز بنجاح , سيتم تأكيد الحجز من قبل الصالون والتواصل معكم');
            }else{
                $reservations->delete();
                return redirect('/')->with('error',' لم تتم عمليه الدفع ' . $response->message);
            }
        }else{
            return redirect('/')->with('error',' لم تتم عمليه الدفع ');
        }

}

    public function pay($request,$user,$orderID,$price)
    {
        $authRequest = [
            "amount" => $price,
            "currency" => "SAR",
            "threeDSecure" => true,
            "save_card" => false,
            "description" => "",
            "statement_descriptor" => "",
            "metadata" => [
                "orderID"=> $orderID,
                "userID"=> $user->id,
            ],
            "reference" => [
                "transaction" => "txn_0001",
                "order" => $orderID
            ],
            "receipt" => [
                "email" => true,
                "sms" => true
            ],
            "customer" => [
                "first_name" => $user->name,
//                "middle_name" => "test",
//                "last_name" => "test",
                "email" =>$user->email,
                "phone" => [
                    "country_code" => "966",
                    "number" => $user->first_phone
                ]
            ],
            "source" => [
                "id" => "src_all"
            ],
            "auto" => [
                "type" => "VOID",
                "time" => 100
            ],
            "post" => [
                "url" => url()->current()
            ],
            "redirect" => [
                "url" => url('/reservations/pay/call_back')
            ]
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.tap.company/v2/charges",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($authRequest),
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer sk_test_19p4KybBi2dj6rS5EvfUh0mw",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }

    }

    public function getCharges($tapID)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.tap.company/v2/charges/".$tapID,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer sk_test_19p4KybBi2dj6rS5EvfUh0mw"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }

    }
}
