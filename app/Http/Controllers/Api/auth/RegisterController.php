<?php

namespace App\Http\Controllers\Api\auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\auth\ClientRegisterResource;
use App\Http\Resources\auth\SalonResource;
use App\Http\Resources\auth\UserRegisterResource;
use App\Http\Resources\users\SalonGeneralSettingsResource;
use App\Http\Resources\users\UserGeneralSettingsResource;
use App\Model\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function salonRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'salon_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'location_address' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'first_phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,first_phone',
            'password' => 'required|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, true, $validator->errors(), 401);
        }

        $createdData = $validator->valid();
        $createdData['password'] = Hash::make($request->password);
        $createdData['status'] = 0;
        $createdData['user_type_id'] = 1;

        $user = User::create($createdData);
        $accessToken = $user->createToken('authToken')->accessToken;
        $data = [
            'user_data' => new SalonResource($user),
            'access_token' => $accessToken,
        ];
        $message = 'Salon Has Been Created Successfully';
        return $this->apiResponse($data, false, $message, 201);
    }

    public function clientRegister(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'city' => 'required|string',
            'notes' => 'sometimes|nullable|string',
            'email' => 'required|email|unique:users',
            'first_phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,first_phone',
            'password' => 'required|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, true, $validator->errors(), 401);
        }

        $createdData = $validator->valid();
        $createdData['name'] = $request->first_name . ' ' . $request->last_name;
        $createdData['password'] = Hash::make($request->password);
        $createdData['status'] = 0;
        $createdData['user_type_id'] = 0;


        $user = User::create($createdData);
        $accessToken = $user->createToken('authToken')->accessToken;
        $data = [
            'user_data' => new UserRegisterResource($user),
            'access_token' => $accessToken,
        ];
        $message = 'Client Has Been Created Successfully';
        return $this->apiResponse($data, false, $message, 201);

    }


}
