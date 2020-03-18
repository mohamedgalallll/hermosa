<?php

namespace App\Http\Controllers\Admin\users\clients;

use App\Http\Controllers\Controller;
use App\Model\User;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:clients_show', ['only' => 'index', 'show']);
        $this->middleware('permission:clients_add', ['only' => 'store', 'create']);
        $this->middleware('permission:clients_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:clients_delete', ['only' => 'destroy']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()){
            $users = User::where('user_type_id',0)->latest()->get();
            return DataTables::of($users)->make(true);
        }
        return view('admin.users.clients.index');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'date_of_birth' => 'sometimes|nullable|date',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'user_image' => 'sometimes|nullable|image',
        ]);
        if ($request->hasFile('user_image') && request()->has('user_image')) {
            $data['user_image'] = $this->storeFile($request->user_image);
        }
        $data['password'] = Hash::make($request->password);
        $data['user_type_id'] = 0;
        User::create($data);
        return redirect()->back()->with('success', trans('web.userHaveBeenCreatedSuccessfully'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = User::findorfail($id);
        return view('admin.users.clients.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {

        $item = User::findorfail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'date_of_birth' => 'sometimes|nullable|date',
            'email' => 'required|email|unique:users,email,' . $item->id,
            'user_image' => 'sometimes|nullable|image',
        ]);
        if ($request->hasFile('user_image') && request()->has('user_image')) {
            $data['user_image'] = $this->storeFile($request->user_image);
        }

        if ($request->has('password') && request('password') != null) {
            $data['password'] = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $data['password'] = Hash::make($request->password);
        }
        $item->update($data);
        return redirect()->back()->with('success', trans('web.userHaveBeenUpdatedSuccessfully'));

    }

    public function destroy($id)
    {
        $item = User::findorfail($id)->delete();
        if (User::find($id)){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }
    }

    public function ChangeClientStatus(Request $request){
        $data = $request->validate([
            'id' => 'required|integer',
            'status' => 'required|integer',
        ]);
        $client = User::findOrFail($data['id']);
        $client->update($data);

        return response()->json($data['status']);
    }
}
