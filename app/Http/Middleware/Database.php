<?php

namespace App\Http\Middleware;

use Closure;

class Database
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

        if(!empty(Config::get('db')) && !empty(Config::get('subdomain'))){
            // Set the new DB.
            Config::set('database.connections.mysql.database', Config::get('db'));

            // Reconnect to the new DB.
            DB::reconnect();
        }
        return $next($request);
    }
}
