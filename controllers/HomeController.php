<?php
namespace App\Controllers;

use App\Providers\View;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Rental;

class HomeController {
    public function index() {
        // Récupérer quelques statistiques pour la page d'accueil
        $car = new Car();
        $customer = new Customer();
        $employee = new Employee();
        $rental = new Rental();
        
        $totalCars = count($car->select());
        $totalCustomers = count($customer->select());
        $totalEmployees = count($employee->select());
        $totalRentals = count($rental->select());
        
        $stats = [
            'total_cars' => $totalCars,
            'total_customers' => $totalCustomers,
            'total_employees' => $totalEmployees,
            'total_rentals' => $totalRentals
        ];
        return View::render('home/home', ['stats' => $stats]);
    }
}