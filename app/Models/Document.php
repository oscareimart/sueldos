<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'path',
        'year',
        'month',
        'status',
        'json',
        'empresa_id'
    ];
    // public function parameters()//: BelongsToMany
    // {
    //     return $this->belongsToMany(Parameter::class, 'detailbonus', 'bonus_id', 'parameter_id');
    // }
}
