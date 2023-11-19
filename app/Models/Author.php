<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable= [
        'name_author',
        'author_image',
        'info',
        'created_at',
        'updated_at',
    ];
    public function books() 
    {
        return $this->hasMany(Book::class);

    }
    public static function getListAuthor()
    {
        return Author::select('id','name_author','author_image','info')
                       ->distinct()
                       ->orderBy('name_author')
                       ->get();

    }
}
