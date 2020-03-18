<?php

namespace App\Http\Controllers\Api\profile\salon;


use App\Http\Resources\profile\salon\SalonBankDetailsResource;
use App\Http\Resources\profile\salon\SalonGeneralSettingsResource;
use App\Http\Resources\profile\salon\SalonImagesResource;
use App\Http\Resources\profile\salon\SalonLocationResource;
use App\Http\Resources\profile\salon\SalonServicesResource;
use App\Http\Resources\profile\salon\SalonServiceTeamResource;
use App\Model\Image;
use App\Model\Service;
use App\Model\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SalonProfileController extends Controller
{

    public function getSalonGeneralSettings()
    {
        $user = new SalonGeneralSettingsResource(auth()->user());
        return $this->apiResponse($user, false, '', 200);
    }

    public function setSalonGeneralSettings(Request $request)
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'salon_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'first_phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,first_phone,' . $user->id,
            'second_phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,second_phone,' . $user->id,
            'third_phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,third_phone,' . $user->id,
            'salon_payment_method_online_payment' => 'sometimes|nullable|in:0,1',
            'salon_payment_method_promotions' => 'sometimes|nullable|in:0,1',
            'salon_payment_method_cash' => 'sometimes|nullable|in:0,1',
            'salon_image' => 'sometimes|nullable|image',
            'salon_license' => 'sometimes|nullable|image',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, true, $validator->errors(), 401);
        }
        $data = $validator->valid();
        $request->hasFile('salon_image') ? $data['salon_image'] = $this->storeFile($request->salon_image, 'salon_image') : '';
        $request->hasFile('salon_license') ? $data['salon_license'] = $this->storeFile($request->salon_license, 'salon_license') : '';

        $user->update($data);
        $message = 'Salon Data Have Been Edited Successfully';
        return $this->apiResponse(new SalonGeneralSettingsResource($user), false, $message, 200);
    }


    public function getSalonBankDetails()
    {
        $user = new SalonBankDetailsResource(auth()->user());
        return $this->apiResponse($user, false, '', 200);
    }

    public function setSalonBankDetails(Request $request)
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'first_bank_account_name' => 'required|string|string',
            'first_bank_account_number' => 'required|integer',
            'second_bank_account_name' => 'sometimes|nullable|string',
            'second_bank_account_number' => 'sometimes|nullable|integer',

        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, true, $validator->errors(), 401);
        }
        $createdData = $validator->valid();
        $user->update($createdData);
        $message = 'Salon Bank Details Have Been Edited Successfully';
        return $this->apiResponse(new SalonBankDetailsResource($user), false, $message, 200);
    }


    public function getSalonLocation()
    {
        $user = new SalonLocationResource(auth()->user());
        return $this->apiResponse($user, false, '', 200);
    }

    public function setSalonLocation(Request $request)
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'location_address' => 'required|string',
            'location_lat' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'location_long' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],

        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, true, $validator->errors(), 401);
        }
        $createdData = $validator->valid();
        $user->update($createdData);
        $message = 'Salon Location Have Been Edited Successfully';
        return $this->apiResponse(new SalonLocationResource($user), false, $message, 200);
    }


    public function getSalonImages()
    {
        $user = auth()->user();

        $images = Image::where('salon_id', $user->id)->get();
        $data = SalonImagesResource::collection($images);
        return $this->apiResponse($data, false, '', 200);
    }

    public function setSalonImages(Request $request)
    {
        $user = auth()->user();


        $validator = Validator::make($request->all(), [
            'image' => 'required|array',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, true, $validator->errors(), 401);
        }

        $data = [
            'salon_id' => $user->id,
        ];
        $i = 0;
        foreach ($request->image as $image) {

            $data['name'] = $request->image[$i]->getClientOriginalName();
            $data['path'] = $this->storeFile($request->image[$i], 'salon_images');
            Image::create($data);
            $i++;

        }
        $message = 'Salon Images Have Been Added Successfully';

        $images = Image::where('salon_id', $user->id)->get();
        return $this->apiResponse(SalonImagesResource::collection($images), false, $message, 200);
    }


    public function getSalonAppointments()
    {
        $user = auth()->user();
        return $this->apiResponse(json_decode($user->salon_appointments), false, '', 200);
    }


    public function setSalonAppointments(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'saturday_from' => 'sometimes|nullable|date_format:H:i',
            'saturday_to' => 'sometimes|nullable|date_format:H:i',
            'sunday_from' => 'sometimes|nullable|date_format:H:i',
            'sunday_to' => 'sometimes|nullable|date_format:H:i',
            'monday_from' => 'sometimes|nullable|date_format:H:i',
            'monday_to' => 'sometimes|nullable|date_format:H:i',
            'tuesday_from' => 'sometimes|nullable|date_format:H:i',
            'tuesday_to' => 'sometimes|nullable|date_format:H:i',
            'wednesday_from' => 'sometimes|nullable|date_format:H:i',
            'wednesday_to' => 'sometimes|nullable|date_format:H:i',
            'thursday_from' => 'sometimes|nullable|date_format:H:i',
            'thursday_to' => 'sometimes|nullable|date_format:H:i',
            'friday_from' => 'sometimes|nullable|date_format:H:i',
            'friday_to' => 'sometimes|nullable|date_format:H:i',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, true, $validator->errors(), 401);
        }
        $data['salon_appointments'] = json_encode($validator->valid());
        $user->update($data);
        $message = 'Salon Appointments Have Been Edited Successfully';

        return $this->apiResponse(json_decode($user->salon_appointments), false, $message, 200);
    }


    public function getSalonServices()
    {
        $user = auth()->user();
        $service = Service::where('salon_id', $user->id)->get();
        return $this->apiResponse(SalonServicesResource::collection($service), false, '', 200);
    }

    public function getSalonService($serviceID)
    {
        $user = auth()->user();
        $service = Service::where('salon_id', $user->id)->where('id', $serviceID)->first();
        if ($service) {
            return $this->apiResponse(new SalonServicesResource($service), false, '', 200);
        }
        $message = 'This Team is not Belongs to this Salon  (Fuck You I have no Exploits :D )';
        return $this->apiResponse(null, true, $message, 401);
    }

    public function editSalonService($serviceID,Request $request)
    {
        $user = auth()->user();
        $service = Service::where('salon_id', $user->id)->where('id', $serviceID)->first();
        if (!$service) {
            $message = 'This Team is not Belongs to this Salon  (Fuck You I have no Exploits :D )';
            return $this->apiResponse(null, true, $message, 401);
        }
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'image' => 'sometimes|nullable|image',
            'time' => 'required|date_format:H:i',
            'price' => 'required|integer',
            'service_list_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, true, $validator->errors(), 401);
        }
        $data = $validator->valid();
        $request->hasFile('image') ? $data['image'] = $this->storeFile($request->image, 'salon_image') : '';

        $service->update($data);

        $message = 'Service Have Been Edited Successfully ';
        return $this->apiResponse(new SalonServicesResource($service), false, $message, 200);
    }
    public function createSalonService(Request $request)
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'image' => 'required|image',
            'time' => 'required|date_format:H:i',
            'price' => 'required|integer',
            'service_list_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, true, $validator->errors(), 401);
        }


        $data = $validator->valid();
        $request->hasFile('image') ? $data['image'] = $this->storeFile($request->image, 'salon_image') : '';
        $data['status'] = 0;
        $data['salon_id'] = $user->id;


        $service = Service::create($data);
        $message = 'Salon Service Have Been Created Successfully';
        return $this->apiResponse(new SalonServicesResource($service), false, $message, 201);
    }


    public function removeSalonService(Request $request)
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'service_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, true, $validator->errors(), 401);
        }

        $data = $validator->valid();

        $service = Service::where('id', $data['service_id'])->where('salon_id', $user->id)->first();
        if ($service) {
            $service->delete();
            $message = 'Salon Service Have Been Deleted Successfully';
            return $this->apiResponse('', false, $message, 202);
        } else {
            $message = 'This Service is not Belongs to this Salon So (Fuck You I have no Exploits :D )';
            return $this->apiResponse(null, true, $message, 401);
        }

    }


    public function getSalonServiceTeam($teamID)
    {
        $user = auth()->user();
        $teams = Team::where('salon_id', $user->id)->where('id', $teamID)->first();
        if ($teams) {
            return $this->apiResponse(new SalonServiceTeamResource($teams), false, '', 200);
        }
        $message = 'This Team is not Belongs to this Salon  (Fuck You I have no Exploits :D )';
        return $this->apiResponse(null, true, $message, 401);
    }

    public function getSalonServiceTeams($serviceID)
    {
        $user = auth()->user();
        $teams = Team::where('salon_id', $user->id)->where('service_id', $serviceID)->get();
        if (count($teams) > 0) {
            return $this->apiResponse(SalonServiceTeamResource::collection($teams), false, '', 200);
        }
        $message = 'No Teams';
        return $this->apiResponse(null, true, $message, 401);
    }

    public function createSalonServiceTeam(Request $request)
{
    $user = auth()->user();
    $validator = Validator::make($request->all(), [
        'name_ar' => 'required|string',
        'name_en' => 'required|string',
        'job_title_ar' => 'required|string',
        'job_title_en' => 'required|string',
        'excerpt_ar' => 'required|string',
        'excerpt_en' => 'required|string',
        'image' => 'required|image',
        'service_id' => 'required|integer',
        'service_list_id' => 'required|integer',
    ]);

    if ($validator->fails()) {
        return $this->apiResponse(null, true, $validator->errors(), 401);
    }


    $data = $validator->valid();
    $service = Service::where('id', $data['service_id'])->where('service_list_id', $data['service_list_id'])->first();
    if (!$service) {
        $message = 'This Service is not Belongs to this Service List (Fuck You I have no Exploits :D )';
        return $this->apiResponse(null, true, $message, 401);
    }
    $request->hasFile('image') ? $data['image'] = $this->storeFile($request->image, 'salon_image') : '';
    $data['status'] = 0;
    $data['salon_id'] = $user->id;

    $team = Team::create($data);
    $message = 'Team  Have Been Created Successfully';
    return $this->apiResponse(new SalonServiceTeamResource($team), false, $message, 201);
}





    public function editSalonServiceTeam($teamID,Request $request)
    {
        $user = auth()->user();
        $team = Team::where('salon_id', $user->id)->where('id', $teamID)->first();
        if (!$team) {
            $message = 'This Team is not Belongs to this Salon  (Fuck You I have no Exploits :D )';
            return $this->apiResponse(null, true, $message, 401);
        }
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'job_title_ar' => 'required|string',
            'job_title_en' => 'required|string',
            'excerpt_ar' => 'required|string',
            'excerpt_en' => 'required|string',
            'image' => 'sometimes|nullable|image',
            'service_id' => 'required|integer',
            'service_list_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, true, $validator->errors(), 401);
        }
        $data = $validator->valid();
        $request->hasFile('image') ? $data['image'] = $this->storeFile($request->image, 'salon_image') : '';
        $team->update($data);
        $message = 'Team  Have Been Update Successfully';
        return $this->apiResponse(new SalonServiceTeamResource($team), false, $message, 201);
    }


    public function removeSalonServiceTeam(Request $request)
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'team_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, true, $validator->errors(), 401);
        }

        $data = $validator->valid();

        $team = Team::where('id', $data['team_id'])->where('salon_id', $user->id)->first();
        if ($team) {
            $team->delete();
            $message = 'Salon Team Have Been Deleted Successfully';
            return $this->apiResponse('', false, $message, 202);
        } else {
            $message = 'This Team is not Belongs to this Salon So (Fuck You I have no Exploits :D )';
            return $this->apiResponse(null, true, $message, 401);
        }

    }


}
