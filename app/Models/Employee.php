<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'document',
        'extension',
        'nationality',
        'birthdate',
        'admission_date',
        'gender',
        'position',
        'salary'
    // protected $fillable = [
    //     'company_id',
    //     'document',
    //     'extention',
    //     'name',
    //     'nationality',
    //     'birthdate',
    //     'dateofadmission',
    //     'gender',
    //     'position',
    //     'salary',

    ];
}
