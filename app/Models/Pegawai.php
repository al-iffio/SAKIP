<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory, Sortable;

    protected $fillable = ['role'];

    public $sortable = [
        'namaPegawai',
        'role'
    ];

    public function scopeFilter($query)
    {
        if(request('search')) {
           return $query->where('namaPegawai', 'like', '%' . request('search') . '%');
        }
    }

    public function timDalnis(): HasMany {
        return $this->hasMany(TimDalnisKt::class, 'dalnis_id');
    }

    public function timKT(): HasMany {
        return $this->hasMany(TimDalnisKt::class, 'kt_id');
    }

    public function unitKerja(): HasOne {
        return $this->hasOne(UnitKerja::class, 'satker_id');
    }
}
