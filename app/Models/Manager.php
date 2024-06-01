<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Manager extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function departments(): HasOne
    {
        return $this->hasOne(Department::class);
    }
}
