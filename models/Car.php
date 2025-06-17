<?php
namespace App\Models;

class Car extends CRUD {
    protected $table = 'cars';
    protected $fillable = ['brand', 'model', 'year', 'daily_price'];
}
