<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
