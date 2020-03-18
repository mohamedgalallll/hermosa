<?php

namespace App\Http\Controllers\site\subscribeEmails;
use App\Http\Controllers\Controller;
use App\Model\SubscribeEmail;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeEmailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categories_show', ['only' => 'index', 'show']);
        $this->middleware('permission:categories_add', ['only' => 'store', 'create']);
        $this->middleware('permission:categories_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:categories_delete', ['only' => 'destroy']);
    }
    public function subscribeEmail(Request $request)
    {
        $data = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribe_emails',
        ]);
        if ($data->fails()){
            return response()->json(false);
        }
        $createdData = [
          'email'  => $request->email,
          'user_id'  => auth()->check() ?  auth()->User()->id : '',
        ];

        SubscribeEmail::create($createdData);
        return response()->json(true);
    }

}
