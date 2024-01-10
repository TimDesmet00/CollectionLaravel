<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $table = 'collections';

    protected $fillable = [
        'shortname',
        'fullname',
        'image',
        'firstgender',
        'secondgender',
        'thirdgender',
        'year',
        'description',
        'link'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    public function images()
    {
        return $this->hasOne(Image::class);
    }
}
