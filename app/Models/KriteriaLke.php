<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KriteriaLke extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subKomponenLke(): BelongsTo {
        return $this->belongsTo(SubKomponenLke::class, 'subKomponenLke_id');
    }

    public function kriteriaKke(): BelongsTo {
        return $this->belongsTo(KriteriaKke::class, 'kriteriaKke_id');
    }

    public function kriteriaTL(): HasOne {
        return $this->hasOne(KriteriaTl::class, 'kriteriaLke_id');
    }
}
