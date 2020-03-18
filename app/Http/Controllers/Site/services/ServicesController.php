<?php

namespace App\Http\Controllers\site\services;

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
            'service_list_id' => 'required|integer',
        ]);
        if ($request->hasFile('image') && request()->has('image')) {
            $data['image'] = $this->storeFile($request->image);
        }
        $data['salon_id'] = auth()->User()->id;
        Service::create($data);
        return redirect()->back()->with('success', trans('web.categoryHaveBeenCreatedSuccessfully'));
    }
    public function edit($id)
    {
        $services= Service::findorfail($id);
        return view('site.profile.salon.tabs.service.edit', compact('services'));
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
            'service_list_id' => 'required|integer',
        ]);

        if ($request->hasFile('image') && request()->has('image')) {
            $data['image'] = $this->storeFile($request->image);
        }
        $data['salon_id'] = auth()->User()->id;
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

    public function getService(Request $request){
        $item =  Service::where('service_list_id',$request->service_list_id)->get();
        return response()->json($item);
    }

}
