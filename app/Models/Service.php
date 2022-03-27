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
        'title',
        'description',
        'price',
        'master_id',
    ];

    public function master(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'master_id', 'id');
    }

}
