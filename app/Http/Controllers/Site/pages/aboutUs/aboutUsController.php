<?php

namespace App\Http\Controllers\Site\Pages\aboutUs;

use App\Http\Controllers\Controller;
use App\Model\AboutUs;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class aboutUsController extends Controller
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
        $item = AboutUs::first();
        return view('site.pages.aboutUs.index', compact('item'));
    }


}
