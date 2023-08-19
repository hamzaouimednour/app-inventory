<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Controllers Ressources Routes
|--------------------------------------------------------------------------
#
*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
|   Wildcard Middleware
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['wildcard']], function () {
            
    /*
    |--------------------------------------------------------------------------
    | Auth Route
    |--------------------------------------------------------------------------
    |
    */
    Route::view('login', 'auth.login')->name('login');

    /*
    |--------------------------------------------------------------------------
    | User Authentication Routes
    |--------------------------------------------------------------------------
    */
    Route::post('/check-auth', [LoginController::class, 'authenticate']);
    Route::get('/logout', [LoginController::class, 'logout']);

    /*
    |--------------------------------------------------------------------------
    | Required Authentication Routes
    |--------------------------------------------------------------------------
    |
    | Using the default laravel middleware Auth.
    |
    */

    Route::middleware(['auth', 'database'])->group(function () {

        Route::get('/', [DashboardController::class, 'index']);

        Route::resource('users', UserController::class)->only([
            'index', 'show', 'update', 'store', 'destroy'
        ]);
        Route::get('users/dossier/{id}', [UserController::class, 'users'])->where('id', '[0-9]+');

        
        Route::resource('dossiers', DossierController::class)->only([
            'index', 'show', 'update', 'store', 'destroy'
        ]);
        Route::post('dossier/user', [DossierController::class, 'user']);
        Route::get('dossier/{id}/users', [DossierController::class, 'getUsers'])->where('id', '[0-9]+');

        Route::resource('familles', FcPerFamilleController::class)->only([
            'index', 'show', 'update', 'store', 'destroy'
        ]);

        Route::resource('sous-familles', FcPerSousfamilleController::class)->only([
            'index', 'show', 'update', 'store', 'destroy'
        ]);

        Route::resource('articles', FcPerArticleController::class)->only([
            'index', 'show', 'update', 'store', 'destroy'
        ]);

        Route::resource('fient-sortie-affectation', FiEntSortieaffectationController::class)->only([
            'index', 'show', 'update', 'store', 'destroy'
        ]);

        Route::resource('fimvt-sortie-affectation', FiMvtSortieaffectationController::class)->only([
            'index', 'show', 'update', 'store', 'destroy'
        ]);

        Route::resource('inventaires', FiPerInventaireController::class)->only([
            'index', 'show', 'update', 'store', 'destroy'
        ]);

        Route::resource('services', FcmRPerServiceController::class)->only([
            'index', 'show', 'update', 'store', 'destroy'
        ]);

        Route::resource('modules', ModuleController::class)->only([
            'index', 'show', 'update', 'store', 'destroy'
        ]);

        Route::resource('module-groups', ModuleGroupController::class)->only([
            'index', 'show', 'update', 'store', 'destroy'
        ]);

        Route::resource('user-permissions', UserPermissionController::class)->only([
            'index', 'show', 'update', 'store', 'destroy'
        ]);

        //Route::match(['get', 'post'], 'account', [UserController::class, 'account'])->name('account');
        Route::get('profile', [UserController::class, 'profile']);
        Route::patch('account', [UserController::class, 'account']);
    });
});