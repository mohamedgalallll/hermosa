<?php

namespace App\Http\Controllers\Site\pages\customerServiceCenter;

use App\Http\Controllers\Controller;
use App\Model\CustomerServiceCenter;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class customerServiceCenterController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:clients_show', ['only' => 'index', 'show']);
        $this->middleware('permission:clients_add', ['only' => 'store', 'create']);
        $this->middleware('permission:clients_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:clients_delete', ['only' => 'destroy']);
    }

    public function index()
    {
        $item = CustomerServiceCenter::first();
        return view('site.pages.customerServiceCenter.index', compact('item'));
    }


}
