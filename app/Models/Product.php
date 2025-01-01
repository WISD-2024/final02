<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

protected $fillable = ['name', 'price', 'description'];

class Product extends Model
{
    use HasFactory;
}
