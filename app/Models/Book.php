<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable= [
        'title_book',
        'original_price',
        'price',
        'description',
        'publish_house',
        'id_author',
        'id_cate',
        'book_image',
        'images',
        'created_at',
        'updated_at',
    ];
    protected $table='books';
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
 public function scopeSearch($query) {
    if($table_search= request()->table_search) {
        $query = $query->where('title_book', 'like','%'.$table_search.'%');
       
    }
  return $query;
 }


 public static function getBookInCart($bookID=0) 
 {
    return Book::where('books.id','='.$bookID)
               ->select('books.id as bookID',
                         'books.book_image',
                         'books.price',
                         'books.title_book')
                         ->get()->first();
 }
}
