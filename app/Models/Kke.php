<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kke extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kriteriaKke(): HasMany {
        return $this->hasMany(KriteriaKke::class, 'kke_id');
    }

    public function getRouteKeyName(): string
    {
        return 'kodeKKE';
    }
}
