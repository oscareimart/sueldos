<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Document;
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
        $employees = Employee::where('company_id',$request->company_id);
        $document = Document::find($request->document_id);
        $checkSheetController = new CheckSheetController();
        $dataSheet = $checkSheetController->getData($request);
        $dataJson = json_decode($document->json);
        Log::info($dataJson);
        $errorsSheet = [];
        foreach ($allDetail as $key => $ds) {
            foreach ($this->allDetailJson as $key => $bonus) {
                $keys = array_keys(get_object_vars($bonus));
                // dd($keys);
                foreach ($keys as $k => $value) {
                    // dd($ds);
                    if(isset($ds->{$value})){
                        if(is_numeric($ds->{$value})){
                            // dd($ds->{$value});
                            // dd($this->allDetailJson[$key]->{$value},$bonus->{$value});
                            if($bonus->{$value} <> $this->strToDouble($this->allDetailJson[$key]->{$value})){
                                $dif = round($ds->{$value} - $this->strToDouble($this->allDetailJson[$key]->{$value}),2);
                                array_push($errorsSheet,[
                                    "employee_id"=>$ds->id,
                                    "obs"=> "Error en ". $value .", empleado: ".$ds->name.", diferencia: ".$dif
                                ]);
                            }
                        }

                    }

                }

                // if($ds->{$bonus->code} <> $this->strToDouble($allDetailJson[$key]->{$bonus->code})){
                //     $dif = round($ds->{$bonus->code} - $this->strToDouble($allDetailJson[$key]->{$bonus->code}),2);
                //     array_push($errorsSheet, "Error en ". $bonus->code .", empleado: ".$ds->name.", diferencia: ".$dif);
                // }
            }

        }

        foreach ($employees as $key => $emp) {
            $emp->obs = [];
            foreach ($errorsSheet as $key => $e) {
                if($emp->id == $e[0]->employee_id){
                    $emp->obs += $e[0]->obs;
                }

            }

        }


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
