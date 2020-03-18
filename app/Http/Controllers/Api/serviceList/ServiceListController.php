<?php

namespace App\Http\Controllers\Api\serviceList;

use App\Http\Controllers\Controller;

use App\Http\Resources\serviceList\ServiceListResource;
use App\Model\ServiceList;
use App\Model\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ServiceListController extends Controller
{

    public function getServiceLists(Request $request)
    {
        $serviceList = ServiceList::get();
        return $this->apiResponse( ServiceListResource::collection($serviceList), false, '', 200);
    }



}
