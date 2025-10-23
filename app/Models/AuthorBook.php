<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    use HasFactory;

    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
