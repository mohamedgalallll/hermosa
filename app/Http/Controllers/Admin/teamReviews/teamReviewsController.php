<?php

namespace App\Http\Controllers\Admin\teamReviews;
use App\Http\Controllers\Controller;
use App\Model\SalonReview;
use App\Model\Team;
use App\Model\TeamReview;
use DataTables;
use Illuminate\Http\Request;

class teamReviewsController extends Controller
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
            $items = TeamReview::latest()->get();
            return DataTables::of($items)->make(true);
        }
        return view('admin.teamReviews.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'reviews_rate' => 'sometimes|nullable|integer',
            'status' => 'sometimes|nullable|integer',
            'reviews_text' => 'sometimes|nullable|string',
            'salon_id' => 'required|integer',
            'user_id' => 'required|integer',
            'team_id' => 'required|integer',
        ]);
        TeamReview::create($data);
        return redirect()->back()->with('success', trans('web.reviewHaveBeenCreatedSuccessfully'));
    }

    public function edit($id)
    {
        $item = TeamReview::findorfail($id);
        return view('admin.teamReviews.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {

        $item = TeamReview::findorfail($id);
        $data = $request->validate([
            'reviews_rate' => 'sometimes|nullable|integer',
            'status' => 'sometimes|nullable|integer',
            'reviews_text' => 'sometimes|nullable|string',
            'salon_id' => 'required|integer',
            'user_id' => 'required|integer',
            'team_id' => 'required|integer',
        ]);
        $item->update($data);
        return redirect()->back()->with('success', trans('web.reviewHaveBeenUpdatedSuccessfully'));

    }

    public function destroy($id)
    {
        $item = TeamReview::findorfail($id)->delete();
        if (TeamReview::find($id)){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }
    }

    public function getTeam(Request $request){
        $item =  Team::where('salon_id',$request->salon_id)->get();
        return response()->json($item);
    }

    public function ChangeTeamStatus(Request $request){
        $data = $request->validate([
            'id' => 'required|integer',
            'status' => 'required|integer',
        ]);
        $teamReview = TeamReview::findOrFail($data['id']);
        $teamReview->update($data);
        return response()->json($data['status']);
    }
}
