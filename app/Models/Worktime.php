<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Worktime extends Model
{
    use HasFactory;

    protected  $fillable = [
        'date',
        'time' //пока каждая услуга по часу.
        //'start_time',
        //'end_time'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(Appointment::class, 'time_id', 'id');
    }
}


