<?php

namespace App\Http\Controllers\Admin\users\salons;

use App\Http\Controllers\Controller;
use App\Model\User;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SalonsController extends Controller
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
            $users = User::where('user_type_id',1)->latest()->get();
            return DataTables::of($users)->make(true);
        }
        return view('admin.users.salons.index');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'date_of_birth' =>'sometimes|nullable|date',
            'location_address' => 'required|string',
            'location_lat' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'location_long' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'salon_name' => 'required|string',
            'first_phone' => 'required|string',
            'salon_description' => 'sometimes|nullable|string',

            'salon_payment_method_online_payment' => 'sometimes|nullable|integer',
            'salon_payment_method_cash' => 'sometimes|nullable|integer',
            'salon_payment_method_promotions' => 'sometimes|nullable|integer',

            'second_phone' => 'sometimes|nullable|string',
            'third_phone' => 'sometimes|nullable|string',
            'first_bank_account_name' => 'required|string',
            'first_bank_account_number' => 'required|integer',
            'second_bank_account_name' => 'sometimes|nullable|string',
            'second_bank_account_number' => 'sometimes|nullable|integer',
            'salon_image' => 'required|image',
            'salon_license' => 'required|image',
            'status' => 'required|integer',
            'password' => 'required|confirmed|min:8',
        ]);

        $data['user_type_id'] = 1;
        $data['password'] = Hash::make($request->password);
        $request->salon_payment_method_online_payment  == 1 ? $data['salon_payment_method_online_payment'] = '1'  : $data['salon_payment_method_online_payment'] = '0';
        $request->salon_payment_method_cash == 1 ? $data['salon_payment_method_cash'] = '1'  : $data['salon_payment_method_cash'] = '0';
        $request->salon_payment_method_promotions == 1 ? $data['salon_payment_method_promotions'] = '1'  : $data['salon_payment_method_promotions'] = '0';
        $request->hasFile('salon_image') ?  $data['salon_image'] = $this->storeFile($request->salon_image) : '';
        $request->hasFile('salon_license') ?  $data['salon_license'] = $this->storeFile($request->salon_license) : '';
        User::create($data);
        return redirect()->back()->with('success', 'Salon Have Been Created Successfully ');
    }

    public function create()
    {
        return view('admin.users.salons.create');
    }

    public function edit($id)
    {
        $item = User::findorfail($id);
        return view('admin.users.salons.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {

        $item = User::findorfail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $item->id,
            'date_of_birth' =>'sometimes|nullable|date',
            'location_address' => 'required|string',
            'location_lat' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'location_long' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'salon_description' => 'sometimes|nullable|string',

            'salon_payment_method_online_payment' => 'sometimes|nullable|integer',
            'salon_payment_method_cash' => 'sometimes|nullable|integer',
            'salon_payment_method_promotions' => 'sometimes|nullable|integer',

            'salon_name' => 'required|string',
            'first_phone' => 'required|string',
            'second_phone' => 'sometimes|nullable|string',
            'third_phone' => 'sometimes|nullable|string',
            'first_bank_account_name' => 'required|string',
            'first_bank_account_number' => 'required|integer',
            'second_bank_account_name' => 'sometimes|nullable|string',
            'second_bank_account_number' => 'sometimes|nullable|integer',
            'salon_image' => 'sometimes|nullable|image',
            'salon_license' => 'sometimes|nullable|image',
            'status' => 'required|integer',
        ]);
        $request->salon_payment_method_online_payment  == 1 ? $data['salon_payment_method_online_payment'] = '1'  : $data['salon_payment_method_online_payment'] = '0';
        $request->salon_payment_method_cash == 1 ? $data['salon_payment_method_cash'] = '1'  : $data['salon_payment_method_cash'] = '0';
        $request->salon_payment_method_promotions == 1 ? $data['salon_payment_method_promotions'] = '1'  : $data['salon_payment_method_promotions'] = '0';
        $request->hasFile('salon_image') ?  $data['salon_image'] = $this->storeFile($request->salon_image) : '';
        $request->hasFile('salon_license') ?  $data['salon_license'] = $this->storeFile($request->salon_license) : '';

        if ($request->has('password') && request('password') != null) {
            $data['password'] = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $data['password'] = Hash::make($request->password);
        }
        $item->update($data);
        return redirect()->back()->with('success','Salon Have Been Updated Successfully ');

    }

    public function destroy($id)
    {
         User::findorfail($id)->delete();
        if (User::find($id)){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }

    }

    public function ChangeSalonStatus(Request $request){
        $data = $request->validate([
            'id' => 'required|integer',
            'status' => 'required|integer',
        ]);
        $salon = User::findOrFail($data['id']);
        $salon->update($data);

        return response()->json($data['status']);
    }

}
