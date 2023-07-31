<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KriteriaTl extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function dokumenTL(): BelongsTo {
        return $this->belongsTo(DokumenTl::class, 'dokumenTL_id');
    }

    public function kriteriaLke(): BelongsTo {
        return $this->belongsTo(KriteriaLke::class, 'kriteriaLKE_id');
    }
}
