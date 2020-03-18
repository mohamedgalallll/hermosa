<?php

namespace App\Http\Controllers\site\teams;
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
            'service_list_id' => 'sometimes|nullable|string',
            'status_team' => 'sometimes|nullable|integer'

        ]);

        if ($request->hasFile('image') && request()->has('image')) {
            $data['image'] = $this->storeFile($request->image);
        }
        $data['salon_id'] = auth()->User()->id;

        Team::create($data);
        return redirect()->back()->with('success', trans('web.teamHaveBeenCreatedSuccessfully'));
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
            'service_list_id' => 'sometimes|nullable|string',
            'status_team' => 'sometimes|nullable|integer'

        ]);
        if ($request->hasFile('image') && request()->has('image')) {
            $data['image'] = $this->storeFile($request->image);
        }
        $data['salon_id'] = auth()->User()->id;
        $item->update($data);
        return redirect()->back()->with('success', trans('web.teamHaveBeenUpdatedSuccessfully'));
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


}
