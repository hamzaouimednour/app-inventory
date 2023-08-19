<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Models\User;
use App\Models\UserDossier;
use App\Helpers\Handler;

use Illuminate\Http\Request;
use App\Http\Requests\DossierRequest;
use DB;
use Artisan;

class DossierController extends Controller
{
    
    /**
     *  @var
     *  blades stored in the resources/views directory.
     */
    public $blades = 'inventaire.dossiers.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( $this->blades.'index', [
            'dossiers' => Dossier::get(['id', 'name', 'user_licenses', 'dossier_licenses', 'date_license', 'license_start_date', 'license_end_date', 'subdomain' ]),
            'dossierAdmins' => User::where('role_id', 2)->get(['id', 'nom', 'prenom'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DossierRequest $request)
    {
        // Insert Dossier Data.
        Dossier::create($request->all());

        // Create Dossier DB.
        Artisan::call('db:create', [ 'name' => $request->dossier_db_name ]);

        // Return Json.
        return response()->json([
            'status' => 'success',
            'info' => 'Elément inséré avec succès.'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
    {
        // Retrieve Items Data.
        $dossier = Dossier::findOrFail($request->input('dossier_id'));
        $dossier_current_users = UserDossier::where('dossier_id',$request->input('dossier_id'))->distinct()->pluck('user_id');
        $dossier_users_list = $request->input('user_id');
        
        if(empty($dossier_users_list) || empty($request->dossier_id)){
            return response()->json([
                'status' => 'failed',
                'info' => 'Tous les champs sont obligatoires.'
            ], 200);
        }

        // in case i want to remove user from admin.
        $users_delete = [];
        foreach ($dossier_current_users as $item) {
            if(!in_array($item, $dossier_users_list)){
                $users_delete[] = $item;
            }
        }
        if(!empty($users_delete)){
            UserDossier::whereIn('user_id', $users_delete)->where('dossier_id', $request->dossier_id)->delete();
            DB::statement('ALTER TABLE user_dossiers AUTO_INCREMENT = 0');
        }
        
        // Retrieve Data.
        $users_dossier = array();
        foreach ($request->input('user_id') as $item) {
            if(!$dossier_current_users->contains('user_id', $item))
                $users_dossier[] = array(
                    'user_id' => $item,
                    'dossier_id' => $request->input('dossier_id')
                );
        }
        
        // Insert UserDossier Data in main DB.
        UserDossier::insert($users_dossier);

        /* DOSSIER DB */

        // Insert item in Dossier DB. (hide id in case of duplicate)
        $users_data = User::whereIn('id', $dossier_users_list)
                            ->select('id AS db_id', 'users.*')
                            ->get()->makeHidden(['id', 'created_at', 'updated_at']);

        // DB Name.
        
        $schemaName = Dossier::find($request->input('dossier_id'))->value('dossier_db_name');
        
        // set mysql_temp DB connection.
        Handler::setDatabaseConnection($schemaName);

        // get already inserted Users.
        $dossier_exist_users = DB::connection('mysql_temp')->table('users')->whereIn('db_id', $dossier_users_list)->pluck('db_id')->toArray();

        // get users data to insert
        $users_data = $users_data->whereNotIn('db_id', $dossier_exist_users)->values()->toArray();

        // INSERT data.
        if(!empty($users_data)){
            DB::connection('mysql_temp')->table('users')->insert($users_data);
        }
        // Delete Admins
        if(!empty($users_delete)){
            DB::connection('mysql_temp')->table('users')->whereIn('db_id', $users_delete)->delete();
        }
        // Return Json.
        return response()->json([
            'status' => 'success',
            'info' => 'Elément inséré avec succès.'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUsers($id)
    {
        $dossier = Dossier::findOrFail($id);
        $dossier_users = UserDossier::where('dossier_id', $id)->get('user_id')->toArray();
        $users = User::whereIn('id', $dossier_users)->get(['id'])->toArray();

        // Return Json.
        return response()->json([
            $users
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Dossier::findOrFail($id);
        $schemaName = $item->dossier_db_name;
        if($item->delete()){
            // RESET AI
            DB::statement('ALTER TABLE dossiers AUTO_INCREMENT = 0');
            // DROP the associated DB.
            DB::statement("DROP DATABASE $schemaName");
            return response()->json([
                'status' => 'success',
                'info' => 'Elément supprimé avec succès'
            ]);
        }
        return response()->json([
            'status' => 'failed',
            'info' => "Echec de la suppression de l'élément"
        ]);
    }
}
