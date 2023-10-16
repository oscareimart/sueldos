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
        'salary',
        'company_id'
    ];

    public function parameters()//: BelongsToMany
    {
        return $this->belongsToMany(Parameter::class, 'detailsheets', 'employee_id', 'parameter_id')->withPivot('value','document_id');
    }
}
