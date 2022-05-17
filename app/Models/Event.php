<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    public static $availableFields = [
        'id',
        'name',
        'lastname',
        'phone',
        'service_id',
        'datetime',
        'master_id',
        'status',
        'fixprice',
        'comment',
    ];

    protected  $fillable = [
        'name',
        'lastname',
        'phone',
        'service_id',
        'datetime',
        'master_id',
        'status',
        'fixprice',
        'comment',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'master_id', 'id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
