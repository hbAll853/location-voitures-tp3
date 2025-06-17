<?php
namespace App\Models;

class Rental extends CRUD {
    protected $table = 'rentals';
    protected $fillable = ['car_id', 'customer_id', 'employee_id', 'start_date', 'end_date', 'total_price'];
}
