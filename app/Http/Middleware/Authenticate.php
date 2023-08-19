<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Route;
use Illuminate\Routing\RouteUrlGenerator;
use DB;
use Config;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        
        if(substr_count($request->getHost(), '.') === 2){

            // Get the specified subdomain.
            $subdomain = explode('.', $request->getHost())[0];

            if($subdomain !== 'www' && !is_null($subdomain) ){

                // Get the specified DB.
                $db = \App\Models\Dossier::where('subdomain', $subdomain)->value('dossier_db_name');
    
                if(is_null($db)){
                    // 404
                    return abort(404);
                }

                // Set config var subdomain / db.
                Config::set('subdomain', $subdomain);
                Config::set('db', $db);

                // dd(DB::select('SHOW TABLES'), DB::connection()->getDatabaseName());
            }
        }

        Config::set('subdomain',    '');
        Config::set('db',           '');

        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
