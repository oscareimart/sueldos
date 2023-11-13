<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Company;
use PDF;
use App\Http\Controllers\CheckSheetController;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allDocuments = Document::all();
        $allCompanies = Company::all();
        // dd($allCompanies);
        return view('pages.reports.index', [
            'title' => 'Reportes',
            'modules' => $request->modules,
            'documents' => $allDocuments,
            'companies' => $allCompanies
        ]);
    }

    public function genReport(Request $request){
        $checkSheetController = new CheckSheetController();
        $dataSheet = $checkSheetController->getData($request);
        $document = Document::find($request->document_id);
        // dd($dataSheet,json_decode($document->json));
        $companyFound = Company::find($request->company_id);
        $dataJson = json_decode($document->json);
        foreach ($dataSheet as $key => $ds) {
            if ($dataJson[$key]) {
                $ds->BAE = floatval($dataJson[$key]->BA);
            }
        }
        // dd($dataSheet);
        $data = [
            'title'=>'Reporte Bono Antiguedad',
            'subtitle'=>$companyFound->business_name,
            'date'=>date('m/d/Y'),
            'data'=>$dataSheet->toArray(),
            //'errors'=>$errorsSheet
        ];
        // dd($data);
        $pdf = PDF::loadView('pages.reports.bantiguedad', $data)->setPaper('landscape');;
        // $pdf->setPaper('A4', 'landscape');


        return $pdf->download('report.pdf');
        // return response()->json(['pdf' => base64_encode($pdf->output())]);
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