<?php

namespace App\Http\Controllers\Admin\pages\customersService;

use App\Http\Controllers\Controller;
use App\Model\CustomerService;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class customersServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:clients_show', ['only' => 'index', 'show']);
        $this->middleware('permission:clients_add', ['only' => 'store', 'create']);
        $this->middleware('permission:clients_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:clients_delete', ['only' => 'destroy']);
    }

    public function index()
    {
        $item = CustomerService::first();
        return view('admin.pages.customersService.edit', compact('item'));
    }

   public function update(Request $request)
   {

       $item = CustomerService::first();
       $data = $request->validate([
           'title_ar' => 'required|string',
           'title_en' => 'required|string',
           'body_ar' => 'required|string',
           'body_en' => 'required|string',
       ]);


       $item->update($data);
       return redirect()->back()->with('success','Salon Have Been Updated Successfully ');

   }

}
