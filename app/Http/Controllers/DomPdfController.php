<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use PDF;
use App\Http\Controllers\CheckSheetController;
use Illuminate\Support\Facades\Log;

class DomPdfController extends Controller
{
    // private $checkSheetController = new CheckSheetController;

    public function generatePDF(Request $request)
    {
        // dd($request->all());
        Log::info($request->all());
        $companyFound = Company::find($request->company_id);

        $checkSheetController = new CheckSheetController();
        $dataSheet = $checkSheetController->getData($request);

        $data = [
            'title'=>'Reporte Empleados Observados',
            'subtitle'=>$companyFound->business_name,
            'date'=>date('m/d/Y'),
            'detail'=>$dataSheet
        ];

        // $dataSheet = CheckSheetController::getData($request);
        Log::info($dataSheet);
        $pdf = PDF::loadView('reports.sheets', $data);

        // return $pdf->download('report.pdf');
        return response()->json(['pdf' => base64_encode($pdf->output())]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
