<?php

namespace App\Http\Controllers\Admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (auth()->check()) {
            if (auth()->User()->user_type_id == 2) {
             return   redirect(url('admin'));
            } else {
                return   redirect(url(''));
            }
        } else {
            return view('admin.auth.login');
        }
    }

    public function register()
    {
        if (auth()->check()) {
            if (auth()->User()->user_type_id == 2) {
                return   redirect(url('admin'));
            } else {
                return   redirect(url(''));
            }
        } else {
            return view('admin.auth.register');
        }
    }

    public function forgotPassword()
    {
        if (auth()->check()) {
            if (auth()->User()->user_type_id == 2) {
                return   redirect(url('admin'));
            } else {
                return   redirect(url(''));
            }
        } else {
            return view('admin.auth.forgotPassword');
        }
    }

    public function edit()
    {
        $item = auth()->User();
        return view('admin.auth.edit',compact('item'));
    }
    public function update(Request $request)
    {
        $item = auth()->User();
        $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email,' . $item->id,
    ]);

        if ($request->has('password') && request('password') != null) {
            $data['password'] = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $data['password'] = Hash::make($request->password);
        }
        $item->update($data);
        return redirect()->back()->with('success', trans('web.yourAccountUpdatedSuccessfully'));
    }
}
