<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worktime extends Model
{
    use HasFactory;

    protected  $fillable = [
        'date',
        'time' //пока каждая услуга по часу.
        //'start_time',
        //'end_time'
    ];
}
