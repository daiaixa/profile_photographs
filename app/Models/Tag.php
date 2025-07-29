<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'name',
        'description'
    ];

    // RELACIONES
    public function photographs(): BelongsToMany
    {
        return $this->belongsToMany(Photograph::class);
    }
}
