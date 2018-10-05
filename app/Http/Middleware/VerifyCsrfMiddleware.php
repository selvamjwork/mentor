<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Config;

class VerifyCsrfMiddleware extends \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken {

protected $except = [
        '/response/status',
        '/response',
    ];
    public function handle($request, Closure $next)
    {
        echo "string";
        // dd($request);
        if ($this->isReading($request) || $this->excludedRoutes($request) || $this->tokensMatch($request))
        {
            return $this->addCookieToResponse($request, $next($request));
        }

        throw new TokenMismatchException;
    }

    protected function excludedRoutes($request)
    {
        $routes = Config::get('indipay.remove_csrf_check');
        
        foreach($routes as $route)
            if ($request->is($route))
                return true;

        return false;
    }
}