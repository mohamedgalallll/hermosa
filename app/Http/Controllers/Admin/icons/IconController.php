<?php

namespace App\Http\Controllers\Admin\icons;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IconController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:icons_show', ['only' => 'index', 'show']);
        $this->middleware('permission:icons_add', ['only' => 'store', 'create']);
        $this->middleware('permission:icons_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:icons_delete', ['only' => 'destroy']);
    }
    public function iconsFontAwesome()
    {

        return view('admin.icons.fontAwesome');
    }
    public function iconsFeather()
    {

        return view('admin.icons.feather');
    }
}
