<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class Customizer
{
    public function handle($request, Closure $next)
    {
        $default_theme_color        = 'theme-primary';
        $default_theme_layout       = '';
        $default_sidebar_switch     = 'menu-expanded';
        $default_navbar_color       = '';
        $default_navbar_type        = 'navbar-sticky';
        $default_footer_type        = 'fixed-footer';
        $default_scroll_top         = 'disabled';

        if ($request->hasCookie('theme_color') == null){
            Cookie::queue(Cookie::make('theme_color',$default_theme_color,262800));
        }
        if ($request->hasCookie('theme_layout') == null){
            Cookie::queue(Cookie::make('theme_layout',$default_theme_layout,262800));
        }
        if ($request->hasCookie('sidebar_switch') == null){
            Cookie::queue(Cookie::make('sidebar_switch',$default_sidebar_switch,262800));
        }
        if ($request->hasCookie('navbar_color') == null){
            Cookie::queue(Cookie::make('navbar_color',$default_navbar_color,262800));
        }
        if ($request->hasCookie('navbar_type') == null){
            Cookie::queue(Cookie::make('navbar_type',$default_navbar_type,262800));
        }
        if ($request->hasCookie('footer_type') == null){
            Cookie::queue(Cookie::make('footer_type',$default_footer_type,262800));
        }
        if ($request->hasCookie('scroll_top') == null){
            Cookie::queue(Cookie::make('scroll_top',$default_scroll_top,262800));
        }

        return $next($request);
    }
}
