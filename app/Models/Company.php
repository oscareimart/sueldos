<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'document_number',
        'business_name',
    ];

    public function bonuses()//: BelongsToMany
    {
        return $this->belongsToMany(Bonus::class, 'companybonuses', 'company_id', 'bonus_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
