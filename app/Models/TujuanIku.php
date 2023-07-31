<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TujuanIku extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ikuUnitKerja(): BelongsTo {
        return $this->belongsTo(ikuUnitKerja::class, 'ikuUnitKerja_id');
    }

    public function sasaranIku(): HasMany {
        return $this->hasMany(SasaranIku::class, 'tujuanIku_id');
    }
}
