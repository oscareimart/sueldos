<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bonus;
use App\Models\Parameter;
use Illuminate\Validation\Rule;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allBonus = Bonus::all()->where('type','bonus');
        $allParameters = Parameter::all();
        return view('pages.bonus.index', [
            'title' => 'Bonos',
            'modules' => $request->modules,
            'data' => $allBonus,
            'params' => $allParameters
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
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'unique:bonuses|required',
            'name' => 'required|max:25',
            'recipe' => 'required',
            'variables' => 'required',
        ]);
        // dd($request->all());
        $request->type = 'bonus';
        $bonus = Bonus::create($request->all());
        // dd($bonus);
        foreach ($request->variables as $key => $v) {
            $paramVariable = Parameter::where('code',$v)->get();
            $bonus->parameters()->attach($paramVariable[0]->id);
        }

        return redirect()->route('bonus.index')
            ->with('success', 'Bono Creado');
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
        // dd($request->all());
        $request->validate([
            'code' => ['required', 'string', 'max:255', Rule::unique('bonuses')->ignore($id)],
            'name' => ['required', 'string', 'max:255'],
            'recipe' => ['required', 'string', 'max:255'],
            'variables' => 'required',
            // 'name' => ['string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'role_id' => ['required'],
        ]);
        $bonus = Bonus::findOrFail($id);
        $bonus->update($request->all());
        // $bonus->update([
        //     'code' => $request->code,
        //     'name' => $request->name,
        //     'recipe' => $request->recipe,
        //     'description' => $request->name,
        //     // Otros campos que necesitas actualizar
        // ]);

        // Actualiza la relación muchos a muchos con los nuevos valores
        $bonus->parameters()->sync([]);

        foreach ($request->variables as $key => $v) {
            $paramVariable = Parameter::where('code', $v)->first();
            if ($paramVariable) {
                $bonus->parameters()->attach($paramVariable->id);
            }
        }
        // $bonusFound = Bonus::find($id);
        // if (!$bonusFound) {
        //     return redirect()->route('users.index')->with('error', 'Usuario no encontrado.');
        // }
        // $bonusFound->update([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'password' => bcrypt($request->input('password')), // Asegúrate de cifrar la nueva contraseña
        //     'role_id' => $request->input('role_id'),
        // ]);
        return redirect()->route('bonus.index')->with('success', 'Bono actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        try {
            $bonusFound = Bonus::find($id);
            // if($bonusFound->is_system)
            //     abort(403, 'No tienes permiso para eliminar un usuario del sistema.');
            $bonusFound->delete();
            return redirect()->route('bonus.index')->with('success', 'Registro eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('bonus.index')->with('error', 'Error al eliminar el registro: '.$e->getMessage());
        }
    }
}
