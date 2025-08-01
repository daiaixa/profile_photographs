<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Photograph extends Model
{
    protected $table = 'photographs';

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'user_id',
        'album_id'
    ];
    

    // RELACIONES
    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)
            ->withTimestamps();
    }


    // METODOS
    protected function getImageUrlAttribute()
    {
        // Verifica si la imagen es nula...
        if (!$this->image_path)
            return null;

        //si se trata de una URL, reemplaza y utiliza http o https
        if (str_starts_with($this->image_path, 'http'))
            return str_replace('http://', 'https://', $this->image_path);

        //Si no entró en ningun if, se trata de una ruta local
        return asset('storage/' . $this->image_path);
    }


    // Este metodo permite que se genere auntomaticamente un posible titulo, de esa forma si el usuario
    // quiere modificarlo, lo hace, sino deja este y añade una descripcion si lo desea
    public static function generateDefaultTitle(): string
    {
        $lastNumber = static::count(); // Obtiene el total de fotos existentes
        return 'foto_' . str_pad($lastNumber + 1, 15, '0', STR_PAD_LEFT); // Genera un título con ceros a la izquierda
    }
}
