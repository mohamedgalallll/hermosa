<?php

namespace App\Http\Controllers\Admin\salonReviews;
use App\Http\Controllers\Controller;
use App\Model\SalonReview;
use App\Model\TeamReview;
use DataTables;
use Illuminate\Http\Request;

class salonReviewsController extends Controller
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
            $items = SalonReview::latest()->get();
            return DataTables::of($items)->make(true);
        }
        return view('admin.salonReviews.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'sometimes|nullable|string',
            'email' => 'required|email|unique:users,email',
            'reviews_rate' => 'sometimes|nullable|integer',
            'status' => 'sometimes|nullable|integer',
            'reviews_text' => 'sometimes|nullable|string',
            'salon_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);
        SalonReview::create($data);
        return redirect()->back()->with('success', trans('web.reviewHaveBeenCreatedSuccessfully'));
    }

    public function edit($id)
    {
        $item = SalonReview::findorfail($id);
        return view('admin.salonReviews.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {

        $item = SalonReview::findorfail($id);
        $data = $request->validate([
            'name' => 'sometimes|nullable|string',
            'email' => 'required|email|unique:users,email',
            'reviews_rate' => 'sometimes|nullable|integer',
            'status' => 'sometimes|nullable|integer',
            'reviews_text' => 'sometimes|nullable|string',
            'salon_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);
        $item->update($data);
        return redirect()->back()->with('success', trans('web.reviewHaveBeenUpdatedSuccessfully'));

    }
    public function destroy($id)
    {
        $item = SalonReview::findorfail($id)->delete();
        if (SalonReview::find($id)){
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
        $salonReviews = SalonReview::findOrFail($data['id']);
        $salonReviews->update($data);

        return response()->json($data['status']);
    }
}
