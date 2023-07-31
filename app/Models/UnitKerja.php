<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitKerja extends Model
{
    use HasFactory, Sortable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public $sortable = [
        'kodeWilayah',
        'kodeUnitKerja',
        'wilayah',
        'namaUnitKerja',
        'namaPIC',
        'noTelpPIC',
        'role'
    ];

    public function scopeFilter($query)
    {
        if(request('search')) {
           return $query->where('namaUnitKerja', 'like', '%' . request('search') . '%');
        }
    }

    public function ikuUnitKerja(): BelongsTo {
        return $this->belongsTo(ikuUnitKerja::class, 'ikuUnitKerja_id');
    }

    public function pegawai(): HasOne {
        return $this->hasOne(Pegawai::class, 'satker_id');
    }

    public function timATSatker(): HasOne {
        return $this->hasOne(TimAtSatker::class, 'unitKerja_id');
    }
}
