<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
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
        $allUser = User::all();
        $allRoles = Role::all();
        $modules = Role::find(Auth::user()->role_id)->modules;
        $mods = $this->getModulesRoles($modules);
        // dd($mods);
        return view('pages.users.index', [
            'title' => 'Usuarios',
            'modules' => $mods,
            'data' => $allUser,
            'roles' => $allRoles
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required'],
        ]);
        $newUser = $request->all();
        // dd($newUser["email"]);
        $newUser["password"] = Hash::make($newUser['password']);
        // dd($newUser);
        User::create($newUser);
        return redirect()->route('users.index')
            ->with('success', 'Usuario Creado');
        // dd($request->all());
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
