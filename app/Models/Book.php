<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'ISBN', 'description', 'publication_year', 'price', 'in_stock', 'checked_out', 'check_in'];

    public function author()
    {
        return $this->hasManyThrough(
            '\App\Models\Author',
            '\App\Models\BookAuthors',
            'book_id',
            'id',
            'id',
            'author_id'
        );
    }

}
