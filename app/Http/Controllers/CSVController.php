<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class CSVController extends Controller
{
    public function importarCSV(Request $request)
    {
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
        foreach ($data as $key => $emp) {
            $emp = [
                "name" => $emp["nombre"],
                "document" => $emp["ci"],
                "extension" => $emp["extension"],
                "nationality" => $emp["nacionalidad"],
                "birthdate" => $this->strToDateFormat($emp["fNacimiento"],"Y-m-d"),
                "admission_date" => $this->strToDateFormat($emp["fIngreso"],"Y-m-d"),
                "gender" => ($emp["genero"] == "M") ? 1:0,
                "position" => $emp["cargo"],
                "salary" => $this->strToDouble($emp["haberBasico"]),
            ];
            Employee::create($emp);
        }

        return redirect()->back()->with('success', 'Archivo CSV importado correctamente');
    }

    public function strToDouble(String $str){
        $string_number = str_replace(".", "", $str);
        $string_number = str_replace(",", ".", $string_number);
        $float_number = (float)$string_number;
        return $float_number;
    }

    public function strToDateFormat(String $date, String $format){
        $birthDate = \DateTime::createFromFormat('d/m/Y', $date);// ($date);
        $f = $birthDate->format($format);
        return $f;
    }
}
