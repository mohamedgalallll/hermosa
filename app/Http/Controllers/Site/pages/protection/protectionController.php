<?php

namespace App\Http\Controllers\Site\pages\protection;

use App\Http\Controllers\Controller;
use App\Model\Protection;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class protectionController extends Controller
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
        $item = Protection::first();
        return view('site.pages.protection.index', compact('item'));
    }


}
