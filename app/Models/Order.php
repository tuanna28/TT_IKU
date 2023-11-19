<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
 protected $fillable= [
   'name',
    'date',
    'id_customer',
    'address',
    'email',
    'phone',
    'total',
    'ship',
    'note',
    'status',
    'payment',
 ];
 public function getWithPaginateBy($idCustomer)
 {
     return $this->whereIdCustomer($idCustomer)->latest('id')->paginate(10);
 }
}
