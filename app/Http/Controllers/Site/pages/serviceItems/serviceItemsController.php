<?php

namespace App\Http\Controllers\Site\pages\serviceItems;

use App\Http\Controllers\Controller;
use App\Model\ServiceItem;


class serviceItemsController extends Controller
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
        $item = ServiceItem::first();
        return view('site.pages.serviceItems.index', compact('item'));
    }


}
