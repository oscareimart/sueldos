<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use App\Models\Parameter;
use App\Models\Bonus;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class CSVController extends Controller
{
    public function importarCSV(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'year' => 'required',
            'month' => 'required',
            'archivo' => 'required|max:30',// . $request->maxSize,
            'company_id' => 'required'
        ]);


        // dd($request->company_id);
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
        // dd($jsond);
        $bonuses = Company::find($request->company_id)->bonuses()->get();
        // dd($bonuses);
        $doc = Document::create($dataDoc);
        // $jsone = json_decode($jsond);
        // dd($doc);
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
            // $bonus = Bonus::where('code','BHE')->get();//bono horas extras
            foreach ($bonuses as $key => $bonus) {
                $bonusParams = Bonus::find($bonus->id)->parameters()->get();
                foreach ($bonusParams as $key => $bp) {
                    $paramVariable = Parameter::where('code',$bp->code)->get();
                    $p = DB::table('detailsheets')->
                        where('employee_id',$employee->id)->
                        where('parameter_id',$paramVariable[0]->id);

                    if(is_null($paramVariable[0]->value) && $p->count() == 0){
                        $employee->parameters()->attach($paramVariable[0]->id,
                        [
                            'value' => $this->strToDouble($emp[$bp->code]),
                            'document_id' => $doc->id,
                        ]
                    );
                    }

                }
            }




        }
        return redirect()->back()->with('success', 'Archivo CSV importado correctamente');
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
        $f = $birthDate->format($format);
        // dd($f);
        return $f;
    }
}
