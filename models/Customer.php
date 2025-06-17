<?php
namespace App\Models;

class Customer extends CRUD {
    protected $table = 'customers';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone'];
}
