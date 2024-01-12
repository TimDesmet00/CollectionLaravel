<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Collection;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favoriteCollections()
    {
        return $this->belongsToMany(Collection::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    // Ajouter une collection aux favoris
    public function addFavorite(Collection $collection)
    {
        return $this->favoriteCollections()->attach($collection->id);
    }

    // Supprimer une collection des favoris
    public function removeFavorite(Collection $collection)
    {
        return $this->favoriteCollections()->detach($collection->id);
    }

    // Vérifier si une collection est un favori
    public function isFavorite(Collection $collection)
    {
        return $this->favoriteCollections()->where('id', $collection->id)->exists();
    }

    
}
