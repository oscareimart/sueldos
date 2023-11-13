<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Module;
use App\Rules\CheckModuleSend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allRoles = Role::paginate(10);
        return view('pages.roles.index', [
            'title' => 'Roles',
            'modules' => $request->modules,
            'data'=>$allRoles
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

    public function getMenu(Request $request){

        return response()->json(['modules' => $request->modules]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'unique:roles|required',
            'checkboxes' => [new CheckModuleSend],
        ]);

        $role = array_filter($request->all(), function ($key) {
            return in_array($key, ['_token', 'name', 'description']);
        }, ARRAY_FILTER_USE_KEY);
        $modules = array_filter($request->all(), function ($key) {
            return strpos($key, 'checkbox-') === 0;
        }, ARRAY_FILTER_USE_KEY);
        $modules += ['checkbox-1' => 'on'];
        $modules = $this->setParent($modules);
        $newRole = Role::create($role);
        foreach ($modules as $key => $value) {
            $newRole->modules()->attach(substr($key,9));
        }
        return redirect()->route('roles.index')
            ->with('success', 'Role Creado');
    }

    public function setParent(Array $modules){
        $modulesParents = [];
        foreach ($modules as $key => $value) {
            $module = Module::find(substr($key,9));
            if($module->level > 0){
                $modulesParents += ['checkbox-'.$module->module_id => 'on'];
            }
        }

        $newModules =  array_merge(array(), $modulesParents);
        return array_merge($modules,$newModules);
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
        //
    }
}
