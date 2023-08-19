<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dossier;

class DashboardController extends Controller
{
    /**
     *  @var
     *  blades stored in the resources/views directory.
     */
    public $blades = 'inventaire.dashboard.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( $this->blades.'index', [
            'dossierNbr' => Dossier::count(),
        ]);
    }
}
