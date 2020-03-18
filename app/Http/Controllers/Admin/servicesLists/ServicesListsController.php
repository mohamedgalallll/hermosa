<?php

namespace App\Http\Controllers\Admin\servicesLists;
use App\Http\Controllers\Controller;
use App\Model\ServiceList;
use DataTables;
use Illuminate\Http\Request;

class ServicesListsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:settings_show', ['only' => 'index']);
        $this->middleware('permission:settings_edit', ['only' => 'store']);
    }
    public function index(Request $request)
    {
        if ($request->ajax()){
            $items = ServiceList::latest()->get();
            return DataTables::of($items)->make(true);
        }
        return view('admin.servicesList.index');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'icon' => 'sometimes|nullable|string',
            'keyword_ar' => 'sometimes|nullable|string',
            'keyword_en' => 'sometimes|nullable|string',
            'description_ar' => 'sometimes|nullable|string',
            'description_en' => 'sometimes|nullable|string',
            'image_ar' => 'sometimes|nullable|image',
            'image_en' => 'sometimes|nullable|image',
            'status' => 'sometimes|nullable|integer'
        ]);

        if ($request->hasFile('image_ar') && request()->has('image_ar')) {
            $data['image_ar'] = $this->storeFile($request->image_ar);
        }
        if ($request->hasFile('image_en') && request()->has('image_en')) {
            $data['image_en'] = $this->storeFile($request->image_en);
        }

        ServiceList::create($data);
        return redirect()->back()->with('success', trans('web.categoryHaveBeenCreatedSuccessfully'));
    }

    public function edit($id)
    {
        $item = ServiceList::findorfail($id);
        return view('admin.servicesList.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {

        $item = ServiceList::findorfail($id);
        $data = $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'icon' => 'sometimes|nullable|string',
            'keyword_ar' => 'sometimes|nullable|string',
            'keyword_en' => 'sometimes|nullable|string',
            'description_ar' => 'sometimes|nullable|string',
            'description_en' => 'sometimes|nullable|string',
            'image_ar' => 'sometimes|nullable|image',
            'image_en' => 'sometimes|nullable|image',
            'status' => 'sometimes|nullable|integer'
        ]);

        if ($request->hasFile('image_ar') && request()->has('image_ar')) {
            $data['image_ar'] = $this->storeFile($request->image_ar);
        }
        if ($request->hasFile('image_en') && request()->has('image_en')) {
            $data['image_en'] = $this->storeFile($request->image_en);
        }


        $item->update($data);
        return redirect()->back()->with('success',trans('web.categoryHaveBeenUpdatedSuccessfully'));

    }

    public function destroy($id)
    {
        $item = ServiceList::findorfail($id)->delete();
        if (ServiceList::find($id)){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }

    }
}
