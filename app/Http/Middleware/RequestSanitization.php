<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequestSanitization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    // add here fields that does not need sanitization such as passwords
    protected $except = [
        'password'
    ];
    public function handle(Request $request, Closure $next)
    {
        $input = $request->all();

        // remove tags and whitespaces from the input fields
        array_walk_recursive($input, function (&$input) {
            if(!in_array($input,$this->except,true)){
                $input = strip_tags($input);
                $input = trim($input);
            }
        });

        $request->merge($input);
        
        return $next($request);
    }
}
