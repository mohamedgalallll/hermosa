<?php

namespace App\Http\Controllers\Api\profile\user;

use App\Http\Resources\profile\user\UserGeneralSettingsResource;
use App\Http\Resources\profile\user\UserLocationResource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function getUserGeneralSettings()
    {
        $user = new UserGeneralSettingsResource(auth()->user());
        return $this->apiResponse($user,false,'',200);
    }

    public function setUserGeneralSettings(Request $request)
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'name'                      => 'required|string|max:255',
            'date_of_birth'             => 'sometimes|nullable|date:Y-m-d',
            'city'                      => 'sometimes|nullable|string|max:255',
            'first_phone'               => 'required|regex:/(01)[0-9]{9}/|unique:users,first_phone,' . $user->id,
            'user_image'                => 'sometimes|nullable|image',
        ]);
        if ($validator->fails()){
            return $this->apiResponse(null,true,$validator->errors(),401);
        }

        $data = $validator->valid();
        $request->hasFile('user_image') ?  $data['user_image'] = $this->storeFile($request->user_image,'user_images') : '';

        $user->update($data);
        $message ='User Data Have Been Edited Successfully';
        return $this->apiResponse( new UserGeneralSettingsResource($user),false,$message,200);
    }


    public function getUserLocation()
    {
        $user = new UserLocationResource(auth()->user());
        return $this->apiResponse($user,false,'',200);
    }

    public function setUserLocation(Request $request)
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'location_address' => 'required|string',
            'location_lat' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'location_long' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
        ]);
        if ($validator->fails()){
            return $this->apiResponse(null,true,$validator->errors(),401);
        }
        $createdData = $validator->valid();
        $user->update($createdData);
        $message ='User Location Have Been Edited Successfully';
        return $this->apiResponse( new UserLocationResource($user),false,$message,200);
    }
}

