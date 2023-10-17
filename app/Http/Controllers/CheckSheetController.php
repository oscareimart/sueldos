<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bonus;
use App\Models\Company;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class CheckSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $getSheetbyMonth = Company::all();
        // $allDetail = DB::table('documents')//->get();
        //     ->join('detailsheets', 'documents.id', '=', 'detailsheets.document_id')
        //     ->join('employees', 'detailsheets.employee_id', '=', 'employees.id')
        //     ->select('employees.id',
        //     'employees.name',
        //     'employees.document',
        //     'employees.extension',
        //     'employees.nationality',
        //     'employees.birthdate',
        //     'employees.admission_date',
        //     'employees.gender',
        //     'employees.position',
        //     'employees.salary',
        //     'employees.company_id')
        //     ->selectRaw('max(case when `detailsheets`.parameter_id = 1 then `detailsheets`.value end) as HE')
        //     ->selectRaw('max(case when `detailsheets`.parameter_id = 2 then `detailsheets`.value end) as HB')
        //     ->groupBy('employees.id',
        //     'employees.name',
        //     'employees.document',
        //     'employees.extension',
        //     'employees.nationality',
        //     'employees.birthdate',
        //     'employees.admission_date',
        //     'employees.gender',
        //     'employees.position',
        //     'employees.salary',
        //     'employees.company_id')
        //     ->get();

        // $allDetailJson = DB::table('documents')->select('json')->get();
        // $allDetailJson = json_decode($allDetailJson[0]->json);
        // // dd($allDetailJson);

        // foreach ($allDetail as $key => $d) {
        //     $v = [];
        //     $bonus = Bonus::where('code','BHE')->get();
        //     $bonusParams = Bonus::find($bonus[0]->id)->parameters()->get();
        //     foreach ($bonusParams as $i => $bp) {
        //         if(is_null($bp->value)){
        //             switch ($bp->code) {
        //                 case 'HE':
        //                     $v += [$bp->code => $d->HE];
        //                     break;

        //                 case 'HBE':
        //                     $v += [$bp->code => $d->HB];
        //                     break;

        //                 default:
        //                     # code...
        //                     break;
        //             }
        //         }else{
        //             $v += [$bp->code => $bp->value];
        //         }

        //     }
        //     $newRecipe = $bonus[0]->recipe;
        //     foreach($v as $k => $v_){
        //         $newRecipe = str_replace($k, $v_, $newRecipe);
        //     }

        //     $result = eval("return $newRecipe;");
        //     $d->totalHE = round($result,2);

        // }


        // $errorsSheet = [];
        // foreach ($allDetail as $key => $ds) {
        //         // if($key == 1){
        //         //     dd($ds->totalHE, $this->strToDouble($allDetailJson[$key]->IHE));
        //         // }
        //         if($ds->totalHE <> $this->strToDouble($allDetailJson[$key]->IHE)){
        //             $dif = round($ds->totalHE - $this->strToDouble($allDetailJson[$key]->IHE),2);
        //             array_push($errorsSheet, "Error en Importe Horas Extras(IHE), empleado: ".$ds->name.", diferencia: ".$dif);
        //         }
        // }
        $allCompanies = Company::paginate(10);
        $allDocuments = Document::paginate(10);
        return view('pages.checksheets.index', [
            'title' => 'Empresas',
            'modules' => $request->modules,
            // 'data' => $allDetail,
            'companies' => $allCompanies,
            'documents' => $allDocuments,
            // 'documentCsv' => $allDetailJson,
            // 'errorsSheet' => $errorsSheet
        ]);
    }

    public function loadData(Request $request){
        // dd($request->all());
        $documentFound = Document::find($request->document_id);
        // dd($documentFound->year);
        $allCompanies = Company::paginate(10);
        $allDocuments = Document::paginate(10);
        $allDetail = DB::table('documents')//->get();
            ->join('detailsheets', 'documents.id', '=', 'detailsheets.document_id')
            ->join('employees', 'detailsheets.employee_id', '=', 'employees.id')
            ->select('employees.id',
            'employees.name',
            'employees.document',
            'employees.extension',
            'employees.nationality',
            'employees.birthdate',
            'employees.admission_date',
            'employees.gender',
            'employees.position',
            'employees.salary',
            'employees.company_id')
            ->selectRaw('max(case when `detailsheets`.parameter_id = 1 then `detailsheets`.value end) as HE')
            ->selectRaw('max(case when `detailsheets`.parameter_id = 2 then `detailsheets`.value end) as HB')
            ->where('documents.year', $documentFound->year)
            ->where('documents.month', $documentFound->month)
            ->where('employees.company_id', $request->company_id)
            ->groupBy('employees.id',
            'employees.name',
            'employees.document',
            'employees.extension',
            'employees.nationality',
            'employees.birthdate',
            'employees.admission_date',
            'employees.gender',
            'employees.position',
            'employees.salary',
            'employees.company_id')
            ->get();

        // dd($allDetail);

        // $allDetailJson = DB::table('documents')->select('json')->get();
        $allDetailJson = json_decode($documentFound->json);
        // dd($allDetailJson);

        foreach ($allDetail as $key => $d) {
            $v = [];
            $bonus = Bonus::where('code','BHE')->get();
            $bonusParams = Bonus::find($bonus[0]->id)->parameters()->get();
            foreach ($bonusParams as $i => $bp) {
                if(is_null($bp->value)){
                    switch ($bp->code) {
                        case 'HE':
                            $v += [$bp->code => $d->HE];
                            break;

                        case 'HBE':
                            $v += [$bp->code => $d->HB];
                            break;

                        default:
                            # code...
                            break;
                    }
                }else{
                    $v += [$bp->code => $bp->value];
                }

            }
            $newRecipe = $bonus[0]->recipe;
            foreach($v as $k => $v_){
                $newRecipe = str_replace($k, $v_, $newRecipe);
            }

            $result = eval("return $newRecipe;");
            $d->totalHE = round($result,2);

        }


        $errorsSheet = [];
        foreach ($allDetail as $key => $ds) {
                // if($key == 1){
                //     dd($ds->totalHE, $this->strToDouble($allDetailJson[$key]->IHE));
                // }
                if($ds->totalHE <> $this->strToDouble($allDetailJson[$key]->IHE)){
                    $dif = round($ds->totalHE - $this->strToDouble($allDetailJson[$key]->IHE),2);
                    array_push($errorsSheet, "Error en Importe Horas Extras(IHE), empleado: ".$ds->name.", diferencia: ".$dif);
                }
        }

        return view('pages.checksheets.index', [
            'title' => 'Empresas',
            'modules' => $request->modules,
            'data' => $allDetail,
            'companies' => $allCompanies,
            'documents' => $allDocuments,
            'documentCsv' => $allDetailJson,
            'errorsSheet' => $errorsSheet
        ]);
    }

    public function strToDouble(String $str){
        $string_number = str_replace(".", "", $str);
        $string_number = str_replace(",", ".", $string_number);
        $float_number = (float)$string_number;
        return $float_number;
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
