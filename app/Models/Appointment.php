<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;
    protected  $fillable = [
        'time_id',
        'name',
        'phone',
        'service_id',
        //workday_id
    ];


    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
    public function worktime(): BelongsTo
    {
        return $this->belongsTo(Worktime::class, 'time_id', 'id');
    }
}
