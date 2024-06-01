<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VacationRequest extends Model
{
    protected $fillable = ['employee_id', 'starts_at', 'ends_at', 'status', 'comment'];

    protected $casts = [
        'starts_at' => 'date:d-m-Y',
        'ends_at' => 'date:d-m-Y',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
