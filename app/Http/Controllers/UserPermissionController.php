<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPermission;
use App\Http\Requests\UserPermissionRequest;
use App\Models\ModuleGroup;
use Auth;

class UserPermissionController extends Controller
{
    /**
     *  @var
     *  blades stored in the resources/views directory.
     */
    public $blades = 'inventaire.user-permissions.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissionsDATA = UserPermission::all();
        $permissions = array();
        
        foreach ($permissionsDATA as $item) {
            $userDATA = User::where('id', $item->user_id)->get(['nom', 'prenom'])->first();
            $groupsDATA = ModuleGroup::whereIn('id', json_decode($item->groups, true))->get();
            $groups = array();
            foreach ($groupsDATA as $group) {
                $groups[$group->id] = $group->group_name ;
            }
            $permissions[] = [
                'id' => $item->id,
                'user_id' => $item->user_id,
                'user_name' => $userDATA->nom.' '.$userDATA->prenom,
                'groups' => $groups,
                'status' => $item->status
            ];
        }
        return view( $this->blades.'index', [
            'permissions' => $permissions,
            'users' => User::whereNotIn('id', [Auth::id()])->get(['id', 'nom', 'prenom']),
            'moduleGroups' => ModuleGroup::all()
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
    public function store(UserPermissionRequest $request)
    {
        UserPermission::create($request->all());

        return response()->json([
            'status' => 'success'
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
        // get the data
        $user = User::where('id', $id)->first();
        $groups = GroupPermission::all();
        $auth_groups = UserPermission::where('user_id', $id)->get()->pluck('group_id')->toArray();

        // show the view and pass the data to it
        return view($this->blades.'show', compact('groups', 'user', 'auth_groups', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        // get the data
        $perm = UserPermission::find($request->input('id'));

        if(is_null($perm)){
            return response()->json([
                'status' => 'failed',
                'info'   => 'Item does not exist.'
            ]);
        }

        $perm->status = $request->input('status');
        $perm->save();

        return response()->json([
            'status' => 'success'
        ]);
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
        // replace old auths by the new onces.
        DB::table((new UserPermission)->getTable())->where('user_id', $id)->delete();
        
        foreach ($request->input('group-id') as $group) {
            $user_perm = new UserPermission;
            $user_perm->group_id = $group;
            $user_perm->user_id = $id;
            $user_perm->save();
        }

        return response()->json([
            'status' => 'success'
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
        // delete
        $group = UserPermission::find($id);
        // return json data.
        if($group->delete()){
            
            self::reset_ai();
            
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'failed'
        ]);
    }
            
    /**
     * Reset AUTO_INCREMENT in table.
     */
    public static function reset_ai()
    {
        $table = (new UserPermission)->getTable();
        DB::statement('ALTER TABLE '. $table .' AUTO_INCREMENT = 0');
    }
}
