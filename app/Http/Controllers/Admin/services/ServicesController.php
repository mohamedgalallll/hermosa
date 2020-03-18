<?php

namespace App\Http\Controllers\Admin\services;

use App\Http\Controllers\Controller;
use App\Model\Service;
use DataTables;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categories_show', ['only' => 'index', 'show']);
        $this->middleware('permission:categories_add', ['only' => 'store', 'create']);
        $this->middleware('permission:categories_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:categories_delete', ['only' => 'destroy']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()){
            $items = Service::latest()->get();
            return DataTables::of($items)->make(true);
        }
        return view('admin.services.index');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar' => 'sometimes|nullable|string',
            'name_en' => 'sometimes|nullable|string',
            'description_ar' => 'sometimes|nullable|string',
            'description_en' => 'sometimes|nullable|string',
            'image' => 'sometimes|nullable|image',
            'time' => 'sometimes|nullable|date_format:H:i',
            'price' => 'sometimes|nullable|integer',
            'status' => 'sometimes|nullable|integer',
            'salon_id' => 'required|integer',
            'service_list_id' => 'required|integer',
        ]);
        if ($request->hasFile('image') && request()->has('image')) {
            $data['image'] = $this->storeFile($request->image);
        }
        Service::create($data);
        return redirect()->back()->with('success', trans('web.categoryHaveBeenCreatedSuccessfully'));
    }

    public function edit($id)
    {
        $item = Service::findorfail($id);
        return view('admin.services.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {

        $item = Service::findorfail($id);
        $data = $request->validate([
            'name_ar' => 'sometimes|nullable|string',
            'name_en' => 'sometimes|nullable|string',
            'description_ar' => 'sometimes|nullable|string',
            'description_en' => 'sometimes|nullable|string',
            'image' => 'sometimes|nullable|image',
            'time' => 'sometimes|nullable|date_format:H:i',
            'price' => 'sometimes|nullable|integer',
            'status' => 'sometimes|nullable|integer',
            'salon_id' => 'required|integer',
            'service_list_id' => 'required|integer',
        ]);
        $request->hasFile('image') ?  $data['image'] = $this->storeFile($request->image) : '';


        $item->update($data);
        return redirect()->back()->with('success', trans('web.categoryHaveBeenUpdatedSuccessfully'));

    }

    public function destroy($id)
    {
        $item = Service::findorfail($id)->delete();
        if (Service::find($id)){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }
    }

    public function GetSubCategories(Request $request){
        $item =  Service::where('main_category_id',$request->main_category_id)->pluck("name_en","id");
        return response()->json($item);
    }

    public function ChangeServiceStatus(Request $request){
        $data = $request->validate([
            'id' => 'required|integer',
            'status' => 'required|integer',
        ]);
        $service = Service::findOrFail($data['id']);
        $service->update($data);

        return response()->json($data['status']);
    }

}
