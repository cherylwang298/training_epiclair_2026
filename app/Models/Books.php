<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'cover',
        'description',
    ];
    public function ratings()
{
    return $this->hasMany(Rating::class, 'book_id');
}
public function getAverageRatingAttribute()
{
    return round($this->ratings()->avg('rating'), 1);
}
}
