<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $allEmployees = Employee::paginate(10);
        $allCompanies = Company::paginate(10);
        // dd($allCompanies);
        return view('pages.employees.index', [
            'title' => 'Empleados',
            'modules' => $request->modules,
            'companies' => $allCompanies,
            'data' => $allEmployees
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
        //dd($request);
        $request->validate([
            'company_id' => 'required',
            'document' => 'unique:employees|required|max:25',
            'extention' => 'required|max:25',
            'name' => 'required|max:25',
            'nationality' => 'required|max:25',
            'birthdate' => 'required|max:25',
            'dateofadmission' => 'required|max:25',
            'gender' => 'required',
            'position' => 'required|max:25',
            'salary' => 'required|max:25',

        ]);
        Employee::create($request->all());
        return redirect()->route('employees.index')
            ->with('success', 'Empleado Creado');
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
