<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MarketingQueryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        $utmQueryParams = [
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
            'utm_content',
        ];
        foreach ($utmQueryParams as $utmQueryParam) {
            if ($request->has($utmQueryParam)) {
                session()->put($utmQueryParam, $request->input($utmQueryParam));
            }
        }

        return $next($request);
    }
}
