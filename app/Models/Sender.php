<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sender extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function waybills()
    {
        return $this->hasMany(Waybill::class);
    }
}
