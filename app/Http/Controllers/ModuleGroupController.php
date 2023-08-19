<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ModuleGroupRequest;
use App\Models\ModuleGroup;
use App\Models\Module; // Modules.

class ModuleGroupController extends Controller
{
    /**
     *  @var
     *  blades stored in the resources/views directory.
     */
    public $blades = 'inventaire.module-groups.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->blades.'index', [
            'moduleGroups' => ModuleGroup::all()->sortByDesc('id'),
            'modules' => Module::get(['id', 'module', 'actions'])
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
    public function store(ModuleGroupRequest $request)
    {
        ModuleGroup::create($request->all());

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
        $group = GroupPermission::find($id);
        $modules = Module::all();

        if(is_null($group)){
            return response()->json([
                'status' => 'failed'
            ]);
        }
        // show the view and pass the data to it
        return view($this->blades.'show', compact('group', 'modules'));
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
        $group  = GroupPermission::findOrFail($id);
        if(is_null($group)){
            return response()->json([
                'status' => 'failed'
            ]);
        }

        if($request->has('modules')){

            $modules = json_decode($request->input('modules'), true);

            $group->name = $request->input('group');
            $group->save();

            // replace old modules by the new onces.
            DB::table((new ModuleGroup)->getTable())->where('group_permission_id', $group->id)->delete();
            
            foreach ($modules as $mod_id => $value) {
                $module_group = new ModuleGroup;
                $module_group->module_id = $mod_id;
                $module_group->group_permission_id = $group->id;
                $module_group->actions = json_encode($value);
                $module_group->save();
            }

            return response()->json([
                'status' => 'success'
            ], 200);
        }else{
            return response()->json([
                'status' => 'failed',
                'info'  => 'Svp sélèctionnez des modules.'
            ], 200);
        }
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
        $group = GroupPermission::find($id);
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
        DB::statement('ALTER TABLE '. (new GroupPermission)->getTable() .' AUTO_INCREMENT = 0');
        DB::statement('ALTER TABLE '. (new ModuleGroup)->getTable() .' AUTO_INCREMENT = 0');
    }
}
