<?php

namespace App\Http\Controllers\Admin\subscribeEmails;
use App\Http\Controllers\Controller;
use App\Model\SubscribeEmail;
use DataTables;
use Illuminate\Http\Request;

class SubscribeEmailsController extends Controller
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
        if ($request->ajax()) {
            $items = SubscribeEmail::latest()->get();
            return DataTables::of($items)->make(true);
        }
        return view('admin.subscribeEmail.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'status' => 'sometimes|nullable|integer',
            'user_id' => 'sometimes|nullable|integer',
        ]);
        SubscribeEmail::create($data);
        return redirect()->back()->with('success', trans('web.reviewHaveBeenCreatedSuccessfully'));
    }
    public function edit($id)
    {
        $item = SubscribeEmail::findorfail($id);
        return view('admin.subscribeEmail.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {

        $item = SubscribeEmail::findorfail($id);
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'status' => 'sometimes|nullable|integer',
            'user_id' => 'sometimes|nullable|integer',
        ]);
        $item->update($data);
        return redirect()->back()->with('success', trans('web.reviewHaveBeenUpdatedSuccessfully'));
    }
    public function destroy($id)
    {
        $item = SubscribeEmail::findorfail($id)->delete();
        if (SubscribeEmail::find($id)){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }
    }
}
