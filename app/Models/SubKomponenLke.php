<?php

namespace App\Models;

use App\Models\KomponenLke;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKomponenLke extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function komponenLke(): BelongsTo {
        return $this->belongsTo(KomponenLke::class, 'komponenLke_id');
    }

    public function kriteriaLke(): HasMany {
        return $this->hasMany(KriteriaLke::class, 'subKomponenLke_id');
    }

    public function getRouteKeyName(): string
    {
        return 'kodeSubKomponen';
    }
}
