<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Bonus;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allBonus = Bonus::all()->where('type','bonus');
        $allDiscount = Bonus::all()->where('type','discount');
        $allCompanies = Company::all();
        return view('pages.company.index', [
            'title' => 'Empresas',
            'modules' => $request->modules,
            'data' => $allCompanies,
            'bonuses' => $allBonus,
            'discounts' => $allDiscount
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'code' => 'unique:companies|required|max:25',
            'document_number' => 'unique:companies|required|max:25',
            'business_name' => 'required',
            'bonuses' => 'required',
            'discounts' => 'required',
        ]);
        // dd($request->bonuses);
        $newCompany = Company::create($request->all());
        foreach ($request->bonuses as $key => $b) {
            $bonusFound = Bonus::where('code',$b)->get();
            // dd($bonusFound->get());
            $newCompany->bonuses()->attach($bonusFound[0]->id);
        }
        foreach ($request->discounts as $key => $b) {
            $bonusFound = Bonus::where('code',$b)->get();
            // dd($bonusFound->get());
            $newCompany->bonuses()->attach($bonusFound[0]->id);
        }
        return redirect()->route('companies.index')
            ->with('success', 'Empresa Creada');
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
