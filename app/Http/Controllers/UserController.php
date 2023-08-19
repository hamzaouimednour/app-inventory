<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Handler;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Dossier;

use DB;
use Auth;
use Hash;
use File;

class UserController extends Controller
{
    
    /**
     *  @var
     *  blades stored in the resources/views directory.
     */
    public $blades = 'inventaire.users.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( $this->blades.'index', [
            'users' => User::get(['id', 'nom', 'prenom', 'email', 'role_id', 'username']),
            'roles' => UserRole::get(['id', 'role'])
        ]);
    }

    /**
     * Display a listing of the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users($dossier)
    {
        // retrieve DB Name.
        // $schemaName = Dossier::find($dossier)->value('dossier_db_name');
        $schema = Dossier::find($dossier)->get(['name', 'dossier_db_name']);

        // set mysql_temp DB connection.
        Handler::setDatabaseConnection($schema->first()->dossier_db_name);

        return view( $this->blades.'index', [
            'users' => DB::connection('mysql_temp')
                            ->table('users')
                            ->get(['id', 'nom', 'prenom', 'email', 'role_id', 'username']),

            'roles' => UserRole::get(['id', 'role']),
            'dossier' => $schema->first()->name,
            'dossiers' => Dossier::get(['id', 'name'])
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
    public function store(UserRequest $request)
    {
        $request->merge([
            'password' => bcrypt($request->input('password'))
        ]);

        // Insert User Data.
        User::create($request->all());

        // Return Json.
        return response()->json([
            'status' => 'success',
            'info' => 'Utilisateur inséré avec succès.'
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
        // get User Data.
        $item = User::findOrFail($id);
        $JsonDATA = $item->only([
            'id',
            'nom',
            'prenom',
            'deuxieme_prenom',
            'telephone',
            'telephone_mobile',
            'email',
            'username',
            'profile_picture',
            'role_id',
            'active'
        ]);
        
        // Return Json.
        return response()->json($JsonDATA, 200);
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
    public function update(UserRequest $request, $id)
    {
        // Retrieve Item Data.
        $item = User::findOrFail($id);

        // Check User password.
        if($request->isNotFilled('password')){
            $request->offsetUnset('password');
        }

        // Update User Data.
        $item->update(
            $request->only([
                'nom',
                'prenom',
                'deuxieme_prenom',
                'telephone',
                'telephone_mobile',
                'email',
                'username',
                'role_id',
                'active',
                'password'
            ])
        );

        // Return Json.
        return response()->json([
            'status' => 'success',
            'info' => 'Utilisateur mis à jour avec succès.'
        ], 200);
    }

    /**
     * Show the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view( $this->blades.'profile', [
            'roles' => UserRole::get(['id', 'role'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function account(UserRequest $request)
    {

        // Retrieve User Data.
        $user = User::find(Auth::id());

        // Check & Update User password.
        if($request->filled('password')){

            if(!Hash::check($request->input('password_old'), $user->password)){
                return response()->json([
                    'errors' => [
                        'info' => 'Mot de passe actuel invalide.'
                    ]
                ], 422);
            }
            $request->merge([
                'password' => bcrypt($request->input('password'))
            ]);
        }else{
            $request->offsetUnset('password');
        }

        // Upload Image
        if($request->hasFile('img')){

            $imgFile = $request->file('img');
            $imgName = time() . "-" . hash('fnv164', $imgFile->getClientOriginalName()) . "." . $imgFile->getClientOriginalExtension();
            // move file.
            if(!$imgFile->move(base_path('assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'profile'), $imgName)){
                return response()->json([
                    'errors' => [
                        'info' => 'Impossible d\'importer l\'image en raison des permissions dossiers insuffisantes.'
                    ]
                ], 422);
            }
            // set request input by file name.
            $request->merge([
                'profile_picture' => $imgName
            ]);
        }

        // Update User Data.
        $user->update(
            $request->only([
                'nom',
                'prenom',
                'deuxieme_prenom',
                'telephone',
                'telephone_mobile',
                'email',
                'username',
                'profile_picture',
                'password'
            ])
        );

        // Return Json.
        return response()->json([
            'status' => 'success',
            'info' => 'Utilisateur mis à jour avec succès.'
        ], 200);
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
        if(!empty($item->profile_picture)){
            File::delete(base_path('assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'profile'. $item->profile_picture));
        }
        if($item->delete()){
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
