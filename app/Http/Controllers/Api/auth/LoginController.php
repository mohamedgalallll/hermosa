<?php

namespace App\Http\Controllers\Api\auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{

    public function login(Request $request)
    {
        $data = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

       if ($data->fails()){
           return $this->apiResponse(null,true,$data->errors(),406);
       }

       $user = User::where('email',$request->email)->first();
       if (!$user){
           $message = 'Login Data Is Incorrect';
           return $this->apiResponse(null,true,$message,406);
       }
       if (Hash::check($request->password,$user->password)){
           $accessToken =$user->createToken('authToken')->accessToken;
           $data = [
               'access_token'=>$accessToken,
           ];
           $message = 'User Have Been Logged';
           return $this->apiResponse($data,false,$message,200);
       }else{
           $message = 'Login Data Is Incorrect';
           return $this->apiResponse(null,true,$message,406);
       }
    }

    public function changePassword(Request $request)
    {
        $user  = auth()->User();
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()){
            return $this->apiResponse(null,true,$validator->errors(),406);
        }
        if (Hash::check($request->old_password,$user->password)){
            $newPassword = [
                'password'               => Hash::make($request->password),
            ];
            $user->update($newPassword);
            $message = ' Password Have Been Changed Successfully';
            return $this->apiResponse('',false,$message,200);
        }else{
            $message = 'Old Password Is Wrong';
            return $this->apiResponse('',true,$message,401);
        }

    }
    public function logout()
    {
        $user = auth()->User()->token();
        $user->revoke();

            $message = 'User Have Been Logged Out Successfully';
            return $this->apiResponse('',false,$message,200);

    }

}
