<?php

namespace App\Http\Controllers\Admin\categories;

use App\Http\Controllers\Controller;
use App\Model\MainCategory;
use DataTables;
use Illuminate\Http\Request;

class MainCategoriesController extends Controller
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
            $items = MainCategory::latest()->get();
            return DataTables::of($items)->make(true);
        }
        return view('admin.categories.mainCategories.index');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar' => 'sometimes|nullable|string',
            'name_en' => 'sometimes|nullable|string',
            'image_ar' => 'sometimes|nullable|image',
            'image_en' => 'sometimes|nullable|image',
            'icon' => 'sometimes|nullable|string',
            'description_ar' => 'sometimes|nullable|string',
            'description_en' => 'sometimes|nullable|string',
            'keyword_ar' => 'sometimes|nullable|string',
            'keyword_en' => 'sometimes|nullable|string',
            'order' => 'sometimes|nullable|integer',
            'status' => 'sometimes|nullable|integer',
        ]);

        if ($request->hasFile('image_ar') && request()->has('image_ar')) {
            $data['image_ar'] = $this->storeFile($request->image_ar);
        }
        if ($request->hasFile('image_en') && request()->has('image_en')) {
            $data['image_en'] = $this->storeFile($request->image_en);
        }
        MainCategory::create($data);
        return redirect()->back()->with('success', trans('web.categoryHaveBeenCreatedSuccessfully'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = MainCategory::findorfail($id);
        return view('admin.categories.mainCategories.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {

        $item = MainCategory::findorfail($id);
        $data = $request->validate([
            'name_ar' => 'sometimes|nullable|string',
            'name_en' => 'sometimes|nullable|string',
            'image_ar' => 'sometimes|nullable|image',
            'image_en' => 'sometimes|nullable|image',
            'icon' => 'sometimes|nullable|string',
            'description_ar' => 'sometimes|nullable|string',
            'description_en' => 'sometimes|nullable|string',
            'keyword_ar' => 'sometimes|nullable|string',
            'keyword_en' => 'sometimes|nullable|string',
            'order' => 'sometimes|nullable|integer',
            'status' => 'sometimes|nullable|integer',
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
        $item = MainCategory::findorfail($id)->delete();
        if (MainCategory::find($id)){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }

    }
}
