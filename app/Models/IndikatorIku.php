<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IndikatorIku extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ikuUnitKerja(): BelongsTo {
        return $this->belongsTo(ikuUnitKerja::class, 'ikuUnitKerja_id');
    }

    public function sasaranIku(): BelongsTo {
        return $this->belongsTo(SasaranIku::class, 'sasaranIku_id');
    }
}
