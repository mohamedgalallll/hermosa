<?php

namespace App\Http\Controllers\Admin\users\admins;

use App\Http\Controllers\Controller;
use App\Model\User;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:admins_show', ['only' => 'index', 'show']);
        $this->middleware('permission:admins_add', ['only' => 'store', 'create']);
        $this->middleware('permission:admins_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:admins_delete', ['only' => 'destroy']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::where('user_type_id', 1)->latest()->get();
            return DataTables::of($users)->make(true);
        }
        return view('admin.users.admins.list.index');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'admin_group' => 'required|integer',
        ]);
        $data['user_type_id'] = 1;
        User::create($data);
        return redirect()->back()->with('success', trans('web.adminHaveBeenCreatedSuccessfully'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = User::findorfail($id);
        return view('admin.users.admins.list.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {

        $item = User::findorfail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $item->id,
            'admin_group' => 'required|integer',
        ]);

        if ($request->has('password') && request('password') != null) {
            $data['password'] = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $data['password'] = Hash::make($request->password);
        }
        $item->update($data);
        return redirect()->back()->with('success', trans('web.adminHaveBeenUpdatedSuccessfully'));

    }

    public function destroy($id)
    {
        $item = User::findorfail($id)->delete();
        if ($item) {
            return response()->json(false, 404);
        } else {
            return response()->json(true, 202);
        }
    }
}
