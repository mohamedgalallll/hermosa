<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function storeFile($file,$place = 'Images')
    {
            $path = $file->store('/public/' . $place);
//        $url = url('/');
            $path = str_replace('public', '', $path);
//        $serverPath = $url . '/storage/app/';
//        $path = $serverPath . $path;
            return $path;
    }

    public function apiResponse($data = null , $error = false ,$message = null , $code = 200){
        $successCodes = [200,201,201];
        $array = [
            'status' => in_array($code,$successCodes) ? true : false,
            'status_code' => $code,
            'message' => $message,
            'error' => $error,
            'data' => $data,
        ];
        return response($array,$code);
    }
    public function notFoundApiResponse(){
        return $this->apiResponse(null,'Not Found !',400);
    }

}
