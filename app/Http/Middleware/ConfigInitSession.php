<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class ConfigInitSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $modules = Role::find(Auth::user()->role_id)->modules;
        // $mods = $this->getModulesRoles($modules);
        $request->modules =$this->getModulesRoles($modules);
        // dd($request);
        return $next($request);
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
}
