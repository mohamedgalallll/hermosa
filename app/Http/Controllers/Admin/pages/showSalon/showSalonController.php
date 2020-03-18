<?php

namespace App\Http\Controllers\Admin\pages\showSalon;

use App\Http\Controllers\Controller;
use App\Model\ShowSalon;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class showSalonController extends Controller
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
        $item = ShowSalon::first();
        return view('admin.pages.showSalon.edit', compact('item'));
    }

   public function update(Request $request)
   {

       $item = ShowSalon::first();
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
