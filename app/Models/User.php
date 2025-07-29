<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image_profile',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // RELACIONES 
    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function photographs(): HasMany
    {
        return $this->hasMany(Photograph::class);
    }

    // Otros metodos 
    protected function getImageUrlAttribute()
    {
        //Verifico si contiene algo, sino retorno null
        if (!$this->image_profile)
            return null;

        //verifico si contiene un http
        if (str_starts_with($this->image_profile, 'http'))
            return str_replace('http://', 'https://', $this->image_profile);

        return asset('storage/', $this->image_profile);
    }
}
