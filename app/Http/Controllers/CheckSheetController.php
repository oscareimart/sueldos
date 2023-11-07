<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bonus;
use App\Models\Company;
use App\Models\Document;
use Carbon\Carbon;
use App\Models\SalaryRange;
use Illuminate\Support\Facades\DB;

class CheckSheetController extends Controller
{

    public $allDetailJson;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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

    public function getData(Request $request){
        // dd($request->all());
        $documentFound = Document::find($request->document_id);
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
            ->selectRaw('max(case when `detailsheets`.parameter_id = 2 then `detailsheets`.value end) as HBE')
            ->selectRaw('max(case when `detailsheets`.parameter_id = 3 then `detailsheets`.value end) as DT')
            ->selectRaw('max(case when `detailsheets`.parameter_id = 4 then `detailsheets`.value end) as DIT')
            ->selectRaw('max(case when `detailsheets`.parameter_id = 5 then `detailsheets`.value end) as HRN')
            ->selectRaw('max(case when `detailsheets`.parameter_id = 6 then `detailsheets`.value end) as OT')
            ->selectRaw('max(case when `detailsheets`.parameter_id = 7 then `detailsheets`.value end) as FI')
            ->selectRaw('max(case when `detailsheets`.parameter_id = 8 then `detailsheets`.value end) as ANT')
            ->selectRaw('max(case when `detailsheets`.parameter_id = 9 then `detailsheets`.value end) as ANS')
            ->selectRaw('max(case when `detailsheets`.parameter_id = 12 then `detailsheets`.value end) as AT')
            ->selectRaw('max(case when `detailsheets`.parameter_id = 13 then `detailsheets`.value end) as PA')
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
        $this->allDetailJson = json_decode($documentFound->json);
        // dd($allDetailJson);
        //bonus
        $bonuses = Company::find($request->company_id)->bonuses()->where('type','bonus')->get();
        // dd($bonuses);
        foreach ($allDetail as $key => $d) {
            $tg = 0;
            $v = [];
            // $bonus = Bonus::where('code','BHE')->get();
            foreach ($bonuses as $key => $bonus) {
                $bonusParams = Bonus::find($bonus->id)->parameters()->get();
                foreach ($bonusParams as $i => $bp) {
                    if(is_null($bp->value)){
                        switch ($bp->code) {
                            case 'HE':
                                $v += [$bp->code => $d->HE];
                                break;

                            case 'HBE':
                                $v += [$bp->code => $d->HBE];
                                break;

                            case 'HRN':
                                $v += [$bp->code => $d->HRN];
                                break;

                            case 'DT':
                                $v += [$bp->code => $d->DT];
                                break;

                            case 'AT':
                                $v += [$bp->code => $d->AT];
                                break;

                            case 'PA':
                                $v += [$bp->code => $d->PA];
                                break;

                            default:
                                # code...
                                break;
                        }
                    }else{
                        $v += [$bp->code => $bp->value];
                    }

                }
                $newRecipe = $bonus->recipe;
                foreach($v as $k => $v_){
                    $newRecipe = str_replace($k, $v_, $newRecipe);
                }
                $result = eval("return $newRecipe;");
                $tg += $result;
                // $in = 'total'.$bonus->code
                $d->{$bonus->code} = round($result,2);

            }
            $d->TG = round($d->HBE + $tg,2);

            //descuentos
            $discounts = Company::find($request->company_id)->bonuses()->where('type','discount')->get();
            // dd($bonuses);
            $td = 0;
            $v = [];

            foreach ($discounts as $key => $discount) {

                // dd($discount);
                $discountParams = Bonus::find($discount->id)->parameters()->get();
                // dd($discountParams);
                foreach ($discountParams as $i => $dp) {
                    if(is_null($dp->value)){
                        switch ($dp->code) {
                            case 'HE':
                                $v += [$dp->code => $d->HE];
                                break;

                            case 'HBE':
                                $v += [$dp->code => $d->HBE];
                                break;

                            case 'HRN':
                                $v += [$dp->code => $d->HRN];
                                break;

                            case 'DT':
                                $v += [$dp->code => $d->DT];
                                break;

                            case 'TG':
                                $v += [$dp->code => $d->TG];
                                break;

                            default:
                                # code...
                                break;
                        }
                    }else{
                        $v += [$dp->code => $dp->value];
                    }

                }



                $newRecipe = $discount->recipe;
                // dd($v);
                foreach($v as $k => $v_){
                    $newRecipe = str_replace($k, $v_, $newRecipe);
                }

                try {
                    $result = eval("return $newRecipe;");
                } catch (\Throwable $th) {
                    // var_dump($th);
                    $tans = 0;//total aporte nacional sol
                    if($discount->code == 'DANS'){//descuento APORTE NACIONAL SOL

                        $salaryRanges = SalaryRange::where('category','Aporte Nacional Solidario')
                            ->orderBy('to','DESC')
                            ->get();
                        // dd($d);
                        foreach ($salaryRanges as $key => $sr) {
                            // dd($sr->to);
                            if($d->salary > $sr->to){
                                // dd($sr->to);
                                $diff = $d->TG - $sr->to;
                                $pans = $diff*($sr->percentage_value/100);
                                // dd($tans);
                                $tans = $tans + $diff*($sr->percentage_value/100);
                                // dump($tans);
                            }
                        }
                        // dump($tans);

                    }
                    $result = $tans;
                }

                if($discount->code == 'DJ'){
                    // dd($d->birthdate);
                    $dateBirth = Carbon::createFromFormat('Y-m-d', $d->birthdate);
                    $today = Carbon::now();
                    $diff = $today->diff($dateBirth);
                    $age = $diff->y;
                    // dd($age);
                    if($age < 65){
                        $result = 0;
                    }
                }

                $td += $result;
                // $in = 'total'.$discount->code
                $d->{$discount->code} = round($result,2);
            }
            $d->TD = round($td,2);
            $d->LP = round($d->TG-$td,2);
        }
        // dd($allDetail);
        return $allDetail;
    }

    public function loadData(Request $request){
        $allDetail = $this->getData($request);
        // dd($allDetail);
        $allCompanies = Company::all();
        $allDocuments = Document::all();
        $errorsSheet = [];
        // dd($allDetail,$this->allDetailJson);

        foreach ($allDetail as $key => $ds) {
            foreach ($this->allDetailJson as $key => $bonus) {
                $keys = array_keys(get_object_vars($bonus));
                // dd($ds,$bonus,$keys);
                if($ds->document == $bonus->ci){
                    foreach ($keys as $k => $value) {
                        // dd($ds);
                        if(isset($ds->{$value})){
                            if(is_numeric($ds->{$value})){
                                $dif = round($ds->{$value} - $this->strToDouble($this->allDetailJson[$key]->{$value}),2);
                                if($bonus->{$value} <> $this->strToDouble($this->allDetailJson[$key]->{$value}) && $dif <> 0){

                                    array_push($errorsSheet,[
                                        "employee_id"=>$ds->id,
                                        "obs"=> "Error en ". $value .", empleado: ".$ds->name.", diferencia: ".$dif
                                    ]);
                                }
                            }

                        }

                    }
                }

            }

        }
        // dd($errorsSheet);

        return view('pages.checksheets.index', [
            'title' => 'Empresas',
            'modules' => $request->modules,
            'data' => $allDetail,
            'companies' => $allCompanies,
            'documents' => $allDocuments,
            'documentCsv' => $this->allDetailJson,
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
