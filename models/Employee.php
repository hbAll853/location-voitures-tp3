<?php
namespace App\Models;

class Employee extends CRUD {
    protected $table = 'employees';
    protected $fillable = ['name', 'email', 'role'];
}
