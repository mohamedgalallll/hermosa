<?php

namespace App\Http\Controllers\Admin\cookie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
class ThemeCookieController extends Controller
{

    public function themeColor(Request $request)
    {
        $theme_color = $request->theme_color;
        Cookie::queue(Cookie::make('theme_color',$theme_color,262800));
        return response()->json(true,200);
    }
    public function themeLayout(Request $request)
    {
        $layout_name = $request->layout_name;
        Cookie::queue(Cookie::make('theme_layout',$layout_name,262800));
        return response()->json(true,200);
    }
    public function sidebarSwitch(Request $request)
    {
        $sidebar_switch = $request->sidebar_switch;
        Cookie::queue(Cookie::make('sidebar_switch',$sidebar_switch,262800));
        return response()->json(true,200);
    }

    public function navBarColor(Request $request)
    {
        $nav_bar_color = $request->nav_bar_color;
        Cookie::queue(Cookie::make('navbar_color',$nav_bar_color,262800));
        return response()->json(true,200);
    }
    public function navBarType(Request $request)
    {
        $nav_bar_type = $request->nav_bar_type;
        Cookie::queue(Cookie::make('navbar_type',$nav_bar_type,262800));
        return response()->json(true,200);
    }

    public function footerType(Request $request)
    {
        $footer_type = $request->footer_data;
        Cookie::queue(Cookie::make('footer_type',$footer_type,262800));
        return response()->json(true,200);
    }

    public function scrollTop(Request $request)
    {
        $scroll_top = $request->scroll_top;
        dd($scroll_top);
        Cookie::queue(Cookie::make('scroll_top',$scroll_top,262800));
        return response()->json(true,200);
    }

}
