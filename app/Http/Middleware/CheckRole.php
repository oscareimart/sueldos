<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        $user = Auth::user();
        $allModules = Module::all('id');
        // dd($request);
        $path = explode('/', $request->path());
        // dd($path[0]);
        $acc = Module::where('path','/'.$path[0])->get();
        // dd($acc[0]->id);
        $role = Role::find($user->role_id);
        $mods = $role->modules()->select('modules.id')->get();
        // dd($mods->toArray());
        $ids = array_map(function ($item) {
            return $item['id'];
        }, $mods->toArray());
        $ids_ = array_map(function ($item) {
            return $item['id'];
        }, $allModules->toArray());
        // dd($acc, $ids);
        // dd(in_array($acc, $ids));
        if ($user && in_array($acc[0]->id, $ids)) {
            return $next($request);
        }else{
            return redirect()->to('/dashboard');
            // foreach ($mods as $key => $m) {
            //     if($m->level == 1){
            //         return redirect()->to($m->path);
            //     }
            // }
        }

        // dd($mods[0]);
        // // dd($mods->toArray(), $allModules);
        // if ($user && in_array($mods->toArray(), $allModules->toArray())) {
        //     return $next($request);
        // }
        // return redirect()->to('/');
    }
}
