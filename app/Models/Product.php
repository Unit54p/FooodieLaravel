<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    public $timestamps = false;
    protected $primaryKey = 'products_id';  // Jika primary key menggunakan 'ID'

    protected $fillable = ['name', 'price', 'type', 'img', 'rating'];
}
