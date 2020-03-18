<?php

namespace App\Http\Controllers\Site\pages\showSalon;

use App\Http\Controllers\Controller;
use App\Model\ShowSalon;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class showSalonController extends Controller
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
        $item = ShowSalon::first();
        return view('site.pages.showSalon.index', compact('item'));
    }


}
