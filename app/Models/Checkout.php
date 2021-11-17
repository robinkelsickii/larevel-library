<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkouts extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'user_name', 'book_title', 'checked_out'];

    public function user()
    {
        return $this->hasManyThrough(
            '\App\Models\User',
            '\App\Models\Checkouts',
            'user_id',
            'id',
            'user_name'
        );
    }

    public function book()
    {
        return $this->hasManyThrough(
            '\App\Models\Book',
            '\App\Models\Checkouts',
            'book_id',
            'id',
            'book_title'
        );
    }
}
