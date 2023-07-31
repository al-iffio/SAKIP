<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KriteriaKke extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kke(): BelongsTo {
        return $this->belongsTo(Kke::class, 'kke_id');
    }

    public function kriteriaKke(): HasOne {
        return $this->hasOne(KriteriaLke::class, 'kriteriaKke_id');
    }
}
