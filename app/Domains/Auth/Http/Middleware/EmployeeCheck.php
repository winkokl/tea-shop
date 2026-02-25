<?php

namespace App\Domains\Auth\Http\Middleware;

use Closure;

/**
 * Class EmployeeCheck.
 */
class EmployeeCheck
{
    /**
     * @param $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->is_employee) {
            return $next($request);
        }

        return redirect()->route('frontend.index')->withFlashDanger(__('You do not have access to do that. Only employees can access this page.'));
    }
}
