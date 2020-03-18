<?php

namespace App\Http\Controllers\site\cart;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Service;
use App\Model\Team;
use App\Model\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categories_show', ['only' => 'index', 'show']);
        $this->middleware('permission:categories_add', ['only' => 'store', 'create']);
        $this->middleware('permission:categories_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:categories_delete', ['only' => 'destroy']);
    }

    public function index()
    {
        $user = auth()->User();
        $carts = Cart::where('user_id', $user->id)->get();
        return view('site.cart.index', compact('carts'));
    }

    public function addToCart($SalonID, $ServiceID, $TeamID)
    {
        $user = auth()->User();
        $team = Team::where('id', $TeamID)->where('salon_id', $SalonID)->where('service_id', $ServiceID)->where('status', 1)->first();
        $salon = User::where('id', $SalonID)->where('status', 1)->where('user_type_id', 1)->first();
        $service = Service::where('id', $ServiceID)->where('salon_id', $SalonID)->where('status', 1)->first();
        if ($user->user_type_id != 0){
            return redirect('/cart')->with('error','مسموح الحجز فقط للأعضاء');
        }
        if ($team && $salon && $service && $user->user_type_id == 0) {
            $carts = Cart::where('user_id', $user->id)->pluck('salon_id')->toArray();
            if (count($carts) > 0) {
                if (!in_array($SalonID, $carts)) {
                    return redirect('/cart')->with('error', trans('web.youCannot'));
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
            return redirect('/cart')->with('success', trans('web.addedTo'));
        }
        abort(404);
    }

    public function destroy($id)
    {
        $user = auth()->User();
        $cart = Cart::where('user_id', $user->id)->where('id', $id)->first();
        if ($cart) {
            $cart->delete($cart);
            return redirect()->back()->with('success', trans('web.cartDeleted'));
        }
    }
}
