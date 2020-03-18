<?php

namespace App\Http\Controllers\Admin\reservations;
use App\Http\Controllers\Controller;
use App\Model\Reservation;
use DataTables;
use Illuminate\Http\Request;

class reservationsController extends Controller
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
            $items = Reservation::latest()->get();
            return DataTables::of($items)->make(true);
        }
        return view('admin.reservations.index');

    }
    public function ChangeRservationsStatus(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|integer',
            'status' => 'required|integer',
        ]);

        $teamReview = Reservation::findOrFail($data['id']);
        $teamReview->update($data);
        return response()->json($data['status']);
    }

}
