<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'active' => 1
        ];
        $remember = true;
        
        if (Auth::attempt($credentials, $remember)) {

            // Return Json.
            return response()->json([
                'status' => 'success',
                'url' => redirect()->intended('/')->getTargetUrl()
            ], 200);
            
        }
        // Return Json.
        return response()->json([
            'status' => 'failed',
            'info' => 'Identifiant et/ou Mot de passe incorrect!'
        ], 200);
    }
    
    
    /**
     * Handle an Logout attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function logout()
    {

        if(Auth::check()){
            Auth::logout();

            if (Session::has('permissions')) {
                Session::forget('permissions');
            }     
        }
        return redirect('/');
    }
}