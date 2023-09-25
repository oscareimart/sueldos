<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'path',
        'icon',
        'status',
        'children',
        'module_id'
    ];

    /**
     * The roles that belong to the Module
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'roles_modules', 'module_id', 'role_id');
        // return $this->belongsToMany(Module::class, 'roles_modules', 'role_id', 'module_id');
    }
}
