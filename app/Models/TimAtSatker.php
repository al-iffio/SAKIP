<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimAtSatker extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pegawaiAT(): BelongsTo {
        return $this->belongsTo(Pegawai::class, 'at_id');
    }

    public function timDalnisKT(): BelongsTo {
        return $this->belongsTo(TimDalnisKt::class, 'timDalnisKT_id');
    }

    public function unitKerja(): BelongsTo {
        return $this->belongsTo(UnitKerja::class, 'unitKerja_id');
    }
}
