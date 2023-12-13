<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'author',
        'isbn',
    ];
    public function images(){
        return $this->hasMany(Image::class, 'book_id', 'id');
    }
}
