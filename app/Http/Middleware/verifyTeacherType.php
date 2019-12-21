<?php

namespace App\Http\Middleware;

use Closure;

class verifyTeacherType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->get('user') == 'Teacher'){
			return $next($request);
		}
		else{
			return back();
		}
    }
}
