<?php

namespace App\Http\Controllers\Site\pages\customersService;

use App\Http\Controllers\Controller;
use App\Model\CustomerService;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class customersServiceController extends Controller
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
        $item = CustomerService::first();
        return view('site.pages.customersService.index', compact('item'));
    }


}
