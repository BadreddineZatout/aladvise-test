<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = ['name', 'manager_id'];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Manager::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
