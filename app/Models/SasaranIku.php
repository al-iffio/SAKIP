<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SasaranIku extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ikuUnitKerja(): BelongsTo {
        return $this->belongsTo(ikuUnitKerja::class, 'ikuUnitKerja_id');
    }

    public function tujuanIku(): BelongsTo {
        return $this->belongsTo(TujuanIku::class, 'tujuanIku_id');
    }

    public function indikatorIku(): HasMany {
        return $this->hasMany(IndikatorIku::class, 'sasaranIku_id');
    }
}
