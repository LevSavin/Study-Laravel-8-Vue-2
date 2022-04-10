<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;
    protected  $fillable = [
        'name',
        'description',
        'price',
        'interval',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'user_id', 'id');
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'service_id', 'id');
    }
}
