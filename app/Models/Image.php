<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'book_id'];

    protected $table = 'images';
    public function books(){
        return $this->belongsTo(Book::class,'book_id');
    }
}
