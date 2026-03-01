<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    //Kl bisa diisi
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'cover',
        'description',
    ];
}
