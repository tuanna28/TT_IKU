<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable= [
        'cate_name',
        'created_at',
        'updated_at',
    ];
    protected $table ='categories';
    public function books() 
    {
        return $this->hasMany(Book::class);

    }
    
}
