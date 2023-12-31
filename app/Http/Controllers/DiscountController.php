<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Bonus;
use App\Models\Parameter;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allDiscount = Bonus::all()->where('type','discount');
        $allParameters = Parameter::all();
        return view('pages.discounts.index', [
            'title' => 'Descuento',
            'modules' => $request->modules,
            'data' => $allDiscount,
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
        $request["type"] = 'discount';
        // dd($request->all());
        $bonus = Bonus::create($request->all());
        // dd($bonus);
        foreach ($request->variables as $key => $v) {
            $paramVariable = Parameter::where('code',$v)->get();
            $bonus->parameters()->attach($paramVariable[0]->id);
        }

        return redirect()->route('discounts.index')
            ->with('success', 'Descuento Creado');
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
