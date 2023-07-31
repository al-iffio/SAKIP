<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DokumenTl extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kriteriaTL(): HasMany {
        return $this->hasMany(KriteriaTl::class, 'dokumenTL_id');
    }

    public function scopeFilter($query)
    {
        if(request('search')) {
           return $query->where('dokumenTL', 'like', '%' . request('search') . '%');
        }
    }
}
