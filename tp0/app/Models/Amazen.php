<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amazen extends Model
{
    use HasFactory;

    protected $fillable = ['sku', 'name', 'description', 'price', 'rate', 'stock'];

}
