<?php
namespace App\Http\Middleware;
use Closure;

class Lang
{
    private $defaultLang = "ar";
    private $appLanguages = ["en", "ar"];
    public function handle($request, Closure $next)
    {
        if ($request->lang) {
            if (in_array($request->lang, $this->appLanguages)) {
                session()->put('lang', $request->lang);
                app()->setLocale($request->lang);
            } else {
                session()->put('lang', $this->defaultLang);
                app()->setLocale($this->defaultLang);
            }
        } else {
            if (session()->has('lang')) {
                app()->setLocale(session()->get('lang'));
            } else {
                session()->put('lang', $this->defaultLang);
                app()->setLocale($this->defaultLang);
            }
        }

        return $next($request);
    }
}
