<?php

namespace App\Http\Controllers\Admin\users\admins;

use App\Http\Controllers\Controller;
use App\Model\User;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use App\Model\AdminGroup;
use Illuminate\Support\Facades\Hash;

class AdminGroupsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:admin_groups_show', ['only' => 'index', 'show']);
        $this->middleware('permission:admin_groups_add', ['only' => 'store', 'create']);
        $this->middleware('permission:admin_groups_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:admin_groups_delete', ['only' => 'destroy']);
    }
    public function validate_value($request){
        $rule=[
            'name_ar'=>'sometimes|nullable|string',
            'name_en'=>'sometimes|nullable|string',
            'description_ar'=>'sometimes|nullable|string',
            'description_en'=>'sometimes|nullable|string',

            'settings_show'=>'sometimes|nullable|in:1,0',
            'settings_edit'=>'sometimes|nullable|in:1,0',

            'clients_show'=>'sometimes|nullable|in:1,0',
            'clients_add'=>'sometimes|nullable|in:1,0',
            'clients_edit'=>'sometimes|nullable|in:1,0',
            'clients_delete'=>'sometimes|nullable|in:1,0',

            'admins_show'=>'sometimes|nullable|in:1,0',
            'admins_add'=>'sometimes|nullable|in:1,0',
            'admins_edit'=>'sometimes|nullable|in:1,0',
            'admins_delete'=>'sometimes|nullable|in:1,0',

            'admin_groups_show'=>'sometimes|nullable|in:1,0',
            'admin_groups_add'=>'sometimes|nullable|in:1,0',
            'admin_groups_edit'=>'sometimes|nullable|in:1,0',
            'admin_groups_delete'=>'sometimes|nullable|in:1,0',

            'categories_show'=>'sometimes|nullable|in:1,0',
            'categories_add'=>'sometimes|nullable|in:1,0',
            'categories_edit'=>'sometimes|nullable|in:1,0',
            'categories_delete'=>'sometimes|nullable|in:1,0',

            'contact_show'=>'sometimes|nullable|in:1,0',
            'contact_add'=>'sometimes|nullable|in:1,0',
            'contact_edit'=>'sometimes|nullable|in:1,0',
            'contact_delete'=>'sometimes|nullable|in:1,0',

            'icons_show'=>'sometimes|nullable|in:1,0',
            'icons_add'=>'sometimes|nullable|in:1,0',
            'icons_edit'=>'sometimes|nullable|in:1,0',
            'icons_delete'=>'sometimes|nullable|in:1,0',
        ];
        $data =  $request->validate($rule);
        $new_data=[];
        foreach ($rule as $k => $v){
            if (empty($request->$k)){
                $new_data[$k]= '0' ;
                if ($k !== $request->name_ar or $k !== $request->description_ar ){

                }
            }else{
                $new_data[$k]= $request->$k ;
            }
        }
        $new_data['name_en'] =$data['name_en'];
        $new_data['name_ar'] =$data['name_ar'];
        $new_data['description_ar'] = $data['description_ar'];
        $new_data['description_en'] = $data['description_en'];
        return $new_data;
    }
    public function index(Request $request)
    {
        if ($request->ajax()){
            $item = AdminGroup::latest()->get();
            return DataTables::of($item)->make(true);
        }
        return view('admin.users.admins.groups.index');
    }

    public function create()
    {
        return view('admin.users.admins.groups.create');
    }
    public function store(Request $request)
    {
        AdminGroup::create($this->validate_value($request));
        return redirect()->back()->with('success', trans('web.groupHaveBeenCreatedSuccessfully'));
    }


    public function edit($id)
    {
        $item = AdminGroup::findOrFail($id);
        return view('admin.users.admins.groups.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = AdminGroup::findOrFail($id);
        $item->update($this->validate_value($request));
        return redirect()->back()->with('success',trans('web.groupHaveBeenEditedSuccessfully'));
    }

    public function destroy($id)
    {
        $item = AdminGroup::findorfail($id)->delete();
        if ($item){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }

    }
}
