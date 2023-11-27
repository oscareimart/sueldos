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
        // dd($request->all());
        $checkSheetController = new CheckSheetController();
        $companyFound = Company::find($request->company_id);
        switch ($request->report_id) {
            case '1'://BA


                $dataSheet = $checkSheetController->getData($request);
                $document = Document::find($request->document_id);
                // dd($dataSheet,json_decode($document->json));

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
                $pdf = PDF::loadView('pages.reports.bantiguedad', $data)->setPaper('landscape');
                # code...
                break;

            case '2'://HIS
                $opt = 1;
                switch ($request->option_id) {
                    case '1':
                        $opt = 2;
                        $data_ = Document::where('status',2)->where('company_id',$request->company_id)->get();
                        break;

                    case '2':
                        $opt = 3;
                        $data_ = Document::where('status',3)->where('company_id',$request->company_id)->get();
                        break;

                    case '3':
                        $opt = 1;
                        $data_ = Document::where('status',1)->where('company_id',$request->company_id)->get();
                        break;

                    default:
                        $data_ = Document::where('company_id',$request->company_id)->get();
                        break;
                }
                // $data = Document::where('status',$request->option_id);
                // dd($data);
                // $dataSheet = $checkSheetController->getData($request,false);
                // dd($dataSheet);
                $data = [
                    'title'=>'Reporte Historico',
                    'subtitle'=>$companyFound->business_name,
                    'date'=>date('m/d/Y'),
                    'data'=>$data_->toArray(),
                    //'errors'=>$errorsSheet
                ];
                // dd($data);
                $pdf = PDF::loadView('pages.reports.historico', $data)->setPaper('A4','landscape');;
                break;

            default:
                # code...
                break;
        }
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
