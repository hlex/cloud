<?php

namespace App\Http\Middleware;

use Closure;
use App\Role;
use App\User;
use Auth;

class CheckRole {
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next, $role) {
    if (!$request->user()->hasRole($role)) {
      // Redirect...
      Auth::logout();
      return abort(401);
    }
    return $next($request);
  }
}
