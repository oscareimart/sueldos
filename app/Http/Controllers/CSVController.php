<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use App\Models\Parameter;
use App\Models\Bonus;
use App\Models\Document;
use App\Models\SalaryRange;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CSVController extends Controller
{

    private $yearWorking;

    public function importarCSV(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'year' => 'required',
                'month' => 'required',
                'archivo' => 'required|max:30',
                'company_id' => 'required'
            ]);
            DB::beginTransaction();
            $archivo = $request->file('archivo');
            $fileContents = file($archivo->getPathname());
            $fields = explode(';',str_replace("\r\n","",array_shift($fileContents)));
            $data = [];
            $content = array_values($fileContents);
            foreach ($content as $key => $e) {
                $values = explode(';',str_replace("\r\n","",$e));
                $arr = [];
                foreach ($values as $key => $v) {
                    $arr += [$fields[$key] => $v];
                }
                array_push($data,$arr);
            }
            $jsond = json_encode($data);
            $dataDoc = $request->all();
            $dataDoc["json"] = $jsond;
            $bonuses = Company::find($request->company_id)->bonuses()->get();
            $doc = Document::create($dataDoc);
            foreach ($data as $key => $emp) {
                $e = [
                    "name" => $emp["nombre"],
                    "document" => $emp["ci"],
                    "extension" => $emp["extension"],
                    "nationality" => $emp["nacionalidad"],
                    "birthdate" => $this->strToDateFormat($emp["fNacimiento"],"Y-m-d"),
                    "admission_date" => $this->strToDateFormat($emp["FI"],"Y-m-d"),
                    "gender" => ($emp["genero"] == "M") ? 1:0,
                    "position" => $emp["cargo"],
                    "salary" => $this->strToDouble($emp["HBE"]),
                    "company_id" => $request->company_id
                ];

                $employee = Employee::create($e);
                foreach ($bonuses as $key => $bonus) {
                    $bonusParams = Bonus::find($bonus->id)->parameters()->get();
                    if($key == 2){//Haber Basico Empleado
                        $employee->parameters()->attach(2,
                            [
                                'value' => $this->strToDouble($emp["HBE"]),
                                'document_id' => $doc->id,
                            ]
                        );
                    }

                    foreach ($bonusParams as $key => $bp) {
                        $paramVariable = Parameter::where('code',$bp->code)->get();
                        $p = DB::table('detailsheets')->
                            where('employee_id',$employee->id)->
                            where('parameter_id',$paramVariable[0]->id);

                        if(is_null($paramVariable[0]->value) && $p->count() == 0){
                            switch ($paramVariable[0]->code) {
                                case 'AT'://años antiguedad
                                    $dateInput = Carbon::createFromFormat('d/m/Y', $emp["FI"]);
                                    $today = Carbon::now();
                                    $diff = $today->diff($dateInput);
                                    $this->yearWorking = $diff->y;
                                    $employee->parameters()->attach($paramVariable[0]->id,
                                        [
                                            'value' => $this->yearWorking,
                                            'document_id' => $doc->id,
                                        ]
                                    );
                                    // dd($yearWorking);
                                    break;

                                case 'PA'://porcentaje antiguedad
                                    $dateInput = Carbon::createFromFormat('d/m/Y', $emp["FI"]);
                                    $today = Carbon::now();
                                    $diff = $today->diff($dateInput);
                                    $this->yearWorking = $diff->y;
                                    // dd($this->yearWorking);
                                    $salaryRange = SalaryRange::where('to','>=',$this->yearWorking)
                                        ->where('category','Bono Antiguedad')
                                        ->limit(1)
                                        ->get();

                                    $employee->parameters()->attach($paramVariable[0]->id,
                                        [
                                            'value' => $salaryRange[0]->percentage_value,
                                            'document_id' => $doc->id,
                                        ]
                                    );
                                    // dd($salaryRange[0]->percentage_value);
                                    break;

                                case 'RS'://porcentaje antiguedad
                                    break;
                                case 'PANS':

                                    break;

                                default://otras variables
                                    $employee->parameters()->attach($paramVariable[0]->id,
                                        [
                                            'value' => $this->strToDouble($emp[$bp->code]),
                                            'document_id' => $doc->id,
                                        ]
                                    );
                                    break;
                            }
                        }

                    }
                }
            }
            DB::commit();
            return redirect()->back()->with('success', 'Archivo CSV importado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al importar el archivo CSV: ' . $th->getMessage());
        }

    }

    // public setRecipeCompanyBonus($employee_id,$company_id){//establece la relacion entre empresa, bonus y parametros
    //     $employee = Employee::create($e);
    //     $bonus = Bonus::where('code','BHE')->get();//bono horas extras
    //     $bonusParams = Bonus::find($bonus[0]->id)->parameters()->get();
    //     foreach ($bonusParams as $key => $bp) {
    //         $paramVariable = Parameter::where('code',$bp->code)->get();
    //         if(is_null($paramVariable[0]->value)){
    //             $employee->parameters()->attach($paramVariable[0]->id,
    //             [
    //                 'value' => $this->strToDouble($emp[$bp->code]),
    //                 'document_id' => $doc->id,
    //             ]
    //         );
    //         }

    //     }
    // }

    public function strToDouble(String $str){
        $string_number = str_replace(".", "", $str);
        $string_number = str_replace(",", ".", $string_number);
        $float_number = (float)$string_number;
        return $float_number;
    }

    public function strToDateFormat(String $date, String $format){
        $birthDate = \DateTime::createFromFormat('d/m/Y', $date);// ($date);
        // dd($birthDate);
        // dump($birthDate);
        try {
            $f = $birthDate->format($format);
        } catch (\Throwable $th) {
            dump($th);
            $f = null;
        }

        // dd($f);
        return $f;
    }
}
