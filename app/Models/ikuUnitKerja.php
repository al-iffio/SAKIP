<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

class ikuUnitKerja extends Model
{
    use HasFactory, Sortable;

    protected $fillable = ['id, namaUnitKerja'];

    public $sortable = [
        'namaUnitKerja'
    ];

    public function scopeFilter($query)
    {
        if(request('search')) {
           return $query->where('namaUnitKerja', 'like', '%' . request('search') . '%');
        }
    }

    public function unitKerja(): HasMany {
        return $this->hasMany(UnitKerja::class, 'ikuUnitKerja_id');
    }

    public function tujuanIku(): HasMany {
        return $this->hasMany(TujuanIku::class, 'ikuUnitKerja_id');
    }

    public function sasaranIku(): HasMany {
        return $this->hasMany(SasaranIku::class, 'ikuUnitKerja_id');
    }

    public function indikatorIku(): HasMany {
        return $this->hasMany(IndikatorIku::class, 'ikuUnitKerja_id');
    }

    public function getRouteKeyName(): string
    {
        return 'namaUnitKerja';
    }
}
