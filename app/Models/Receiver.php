<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receiver extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'inn', 'kpp'];

    public function waybills()
    {
        return $this->hasMany(Waybill::class);
    }
}
