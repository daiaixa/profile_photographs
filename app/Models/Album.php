<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = [
        'title',
        'description',
        'slug',
        'main_photo',
        'user_id',
    ];

    // RELACIONES
    public function photographs(): HasMany
    {
        return $this->hasMany(Photograph::class);
    }

    // RELACION INVERSA
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Metodos
    protected function getImageUrlAttribute()
    {
        //Verifica que no esté vacia y si lo está asigna un null
        if (!$this->main_photo)
            return null;

        //Verifica si es una url y reemplaza utilizando http o https
        if (str_starts_with($this->main_image, 'http'))
            return str_replace('http://', 'https://', $this->main_photo);

        // Si no entre en ninguno de los anteriores
        return asset('storage/'. $this->main_photo);
    }
}
