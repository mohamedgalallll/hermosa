<?php

namespace App\Http\Controllers\Site\pages\helpingPartners;

use App\Http\Controllers\Controller;
use App\Model\HelpingPartner;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class helpingPartnersController extends Controller
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
        $item = HelpingPartner::first();
        return view('site.pages.helpingPartners.index', compact('item'));
    }


}
