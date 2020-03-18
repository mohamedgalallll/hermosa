<?php

namespace App\Http\Controllers\Admin\pages\homeBackground;

use App\Http\Controllers\Controller;
use App\Model\HomeBackground;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class homeBackgroundController extends Controller
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
        $item = HomeBackground::first();
        return view('admin.pages.homeBackground.edit', compact('item'));
    }

   public function update(Request $request)
   {

       $item = HomeBackground::first();
       $data = $request->validate([
           'img_ar' => 'sometimes|nullable|image',
           'img_en' => 'sometimes|nullable|image',
           'text_ar' => 'sometimes|nullable|string',
           'text_en' => 'sometimes|nullable|string',
       ]);
       $request->hasFile('img_ar') ?  $data['img_ar'] = $this->storeFile($request->img_ar) : '';
       $request->hasFile('img_en') ?  $data['img_en'] = $this->storeFile($request->img_en) : '';


       $item->update($data);
       return redirect()->back()->with('success','Salon Have Been Updated Successfully ');

   }

}
