<?php

namespace App\Models;

use App\Models\SubKomponenLke;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KomponenLke extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getRouteKeyName(): string
    {
        return 'kodeKomponen';
    }

    public function subKomponenLke(): HasMany {
        return $this->hasMany(SubKomponenLke::class, 'komponenLke_id');
    }
}
