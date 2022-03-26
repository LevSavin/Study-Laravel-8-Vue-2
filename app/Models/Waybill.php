<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Waybill extends Model
{
    use HasFactory;

    protected $fillable = ['master_id', 'receiver_id', 'sender_id', 'status_id', 'number'];

    public function master()
    {
        return $this->belongsTo(Master::class);
    }

    public function receiver()
    {
        return $this->belongsTo(Receiver::class);
    }

    public function sender()
    {
        return $this->belongsTo(Sender::class);
    }

    public function statuses()
    {
        return $this->belongsToMany(Status::class)->withPivot('datetime');
    }
}
