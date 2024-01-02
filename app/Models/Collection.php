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
}
