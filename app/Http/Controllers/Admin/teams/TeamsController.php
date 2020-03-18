<?php

namespace App\Http\Controllers\Admin\teams;
use App\Http\Controllers\Controller;
use App\Model\Team;
use DataTables;
use Illuminate\Http\Request;

class TeamsController extends Controller
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
            $items = Team::latest()->get();
            return DataTables::of($items)->make(true);
        }
        return view('admin.teams.index');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar' => 'sometimes|nullable|string',
            'name_en' => 'sometimes|nullable|string',
            'job_title_ar' => 'sometimes|nullable|string',
            'job_title_en' => 'sometimes|nullable|string',
            'image' => 'sometimes|nullable|image',
            'excerpt_ar' => 'sometimes|nullable|string',
            'excerpt_en' => 'sometimes|nullable|string',
            'salon_id' => 'required|integer',
            'service_list_id' => 'sometimes|nullable|string',
        ]);

        if ($request->hasFile('image') && request()->has('image')) {
            $data['image'] = $this->storeFile($request->image);
        }
        Team::create($data);
        return redirect()->back()->with('success', trans('web.categoryHaveBeenCreatedSuccessfully'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = Team::findorfail($id);
        return view('admin.teams.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $item = Team::findorfail($id);
        $data = $request->validate([
            'name_ar' => 'sometimes|nullable|string',
            'name_en' => 'sometimes|nullable|string',
            'job_title_ar' => 'sometimes|nullable|string',
            'job_title_en' => 'sometimes|nullable|string',
            'image' => 'sometimes|nullable|image',
            'excerpt_ar' => 'sometimes|nullable|string',
            'excerpt_en' => 'sometimes|nullable|string',
            'salon_id' => 'required|integer',
            'service_list_id' => 'sometimes|nullable|string',

        ]);

        if ($request->hasFile('image') && request()->has('image')) {
            $data['image'] = $this->storeFile($request->image);
        }

        $item->update($data);
        return redirect()->back()->with('success', trans('web.categoryHaveBeenUpdatedSuccessfully'));

    }

    public function destroy($id)
    {
        $item = Team::findorfail($id)->delete();
        if (Team::find($id)){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }
    }


    public function GetSubCategories(Request $request){
        $item =  SubCategory::where('main_category_id',$request->main_category_id)->pluck("name_en","id");
        return response()->json($item);
    }


    public function ChangeTeamsStatus(Request $request){
        $data = $request->validate([
            'id' => 'required|integer',
            'status' => 'required|integer',
        ]);
        $team = Team::findOrFail($data['id']);
        $team->update($data);

        return response()->json($data['status']);
    }
}
