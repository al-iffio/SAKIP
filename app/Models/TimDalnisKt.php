<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimDalnisKt extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pegawaiDalnis(): BelongsTo {
        return $this->belongsTo(Pegawai::class, 'dalnis_id');
    }

    public function pegawaiKT(): BelongsTo {
        return $this->belongsTo(Pegawai::class, 'kt_id');
    }

    public function timATSatker(): HasMany {
        return $this->hasMany(TimAtSatker::class, 'timDalnisKT_id');
    }

    // public function scopeFilter($query)
    // {
    //     if(request('search')) {
    //        return $query->where('namaPegawai', 'like', '%' . request('search') . '%');
    //     }
    // }
}
