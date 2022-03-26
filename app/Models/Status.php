<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;

    public function waybills()
    {
        return $this->belongsToMany(Waybill::class)->withPivot('datetime');
    }
}
