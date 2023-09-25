<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUser = User::paginate(10);
        $modules = Role::find(Auth::user()->role_id)->modules;
        $mods = $this->getModulesRoles($modules);
        // dd($mods);
        return view('pages.users.index', [
            'title' => 'Usuarios',
            'modules' => $mods,
            'data' => $allUser
        ]);
    }

    function getModulesRoles($modules){
        $modulesMain = [];
        $modulesSec = [];

        foreach ($modules as $key => $module) {
            if ($module->level == 0) {
                array_push($modulesMain, $module);
            }
            if ($module->level == 1) {
                array_push($modulesSec, $module);
            }
        }
        foreach ($modulesMain as $key => $module) {
            $smodules = [];
            foreach ($modulesSec as $key => $smodule) {
                if($smodule->module_id == $module->id ){
                    array_push($smodules,$smodule);
                }
            }
            $module->modules = $smodules;
        }
        return $modulesMain;
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
    public function store(Request $request)
    {
        //
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
