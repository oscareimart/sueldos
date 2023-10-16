<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'recipe',
        'description'
    ];

    public function parameters()//: BelongsToMany
    {
        return $this->belongsToMany(Parameter::class, 'detailbonus', 'bonus_id', 'parameter_id');
    }
}
