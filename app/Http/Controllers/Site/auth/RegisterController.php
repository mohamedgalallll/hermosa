<?php

namespace App\Http\Controllers\site\auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public  function  ShowRegisterPage(){
        if (auth()->check()){
            return redirect('/');
        }else{
            return view('auth.register');
        }
    }
    public  function  salonRegister(Request $request){
        if (auth()->check()){
            return redirect('/');
        }else{
            $data = $request->validate([
                'salon_name'             => 'required|string',
                'name'                   => 'required|string',
                'salon_location_address' => 'required|string',
                'email'                  => 'required|email|unique:users,email',
                'first_phone'            => 'required|regex:/(01)[0-9]{9}/|unique:users,first_phone',
                'password'               => 'required|min:6',
            ]);
            $data['password'] = Hash::make($request->password);
            $data['user_type_id'] = 1;
            $data['status'] = 0;
            $user = User::create($data);
            Auth::login($user);
            return redirect('/profile')->with('success', 'مرحبا بك , شكرا للتسجيل في هير موسي ,  سيتم مراجعه بيانات الصالون الخاصه بك , برجاء استكمال بيانات الصالون حتي يتم قبول عضويتك');
        }
    }

    public  function  clientRegister(Request $request){
        if (auth()->check()){
            return redirect('/');
        }else{
            $data = $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'city' => 'required|string',
                'notes' => 'sometimes|nullable|string',
                'email' => 'required|email|unique:users,email',
                'first_phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,first_phone',
                'password' => 'required|min:6',
            ]);
            $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
            $data['password'] = Hash::make($request->password);
            $data['user_type_id'] = 0;
            $user = User::create($data);
            Auth::login($user);
            return redirect('/')->with('success', 'مرحبا بك , شكرا للتسجيل في هير موسي');
        }
    }


}
