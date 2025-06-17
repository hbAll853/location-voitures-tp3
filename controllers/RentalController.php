<?php
namespace App\Controllers;

use App\Models\Rental;
use App\Providers\View;
use App\Providers\Validator;

class RentalController {
    public function index() {
        $rental = new Rental();
        $rentals = $rental->select();
        return View::render('rental/index', ['rentals' => $rentals]);
    }

    public function show($data) {
        if (isset($data['id'])) {
            $rental = new Rental();
            $rentalData = $rental->selectId($data['id']);
            if ($rentalData) {
                return View::render('rental/show', ['rental' => $rentalData]);
            } else {
                return View::render('error', ['message' => 'Rental not found!']);
            }
        }
    }

    public function create() {
        return View::render('rental/create');
    }

    public function store($data) {
        $validator = new Validator();
        $validator->field('car_id', $data['car_id'])->required();
        $validator->field('customer_id', $data['customer_id'])->required();
        $validator->field('employee_id', $data['employee_id'])->required();
        $validator->field('start_date', $data['start_date'])->required();
        $validator->field('end_date', $data['end_date'])->required();
        $validator->field('total_price', $data['total_price'])->required();

        if ($validator->isSuccess()) {
            $rental = new Rental();
            $insertId = $rental->insert($data);
            return View::redirect('rental');
        } else {
            $errors = $validator->getErrors();
            return View::render('rental/create', ['errors' => $errors, 'rental' => $data]);
        }
    }

    public function edit($data) {
        if (isset($data['id'])) {
            $rental = new Rental();
            $rentalData = $rental->selectId($data['id']);
            if ($rentalData) {
                return View::render('rental/edit', ['rental' => $rentalData]);
            } else {
                return View::render('error', ['message' => 'Rental not found!']);
            }
        }
    }

    public function update($data) {
        $rental = new Rental();
        $updated = $rental->update($data, $data['id']);
        if ($updated) {
            return View::redirect('rental');
        } else {
            return View::render('error', ['message' => 'Update failed!']);
        }
    }

    public function delete($data) {
        if (isset($data['id'])) {
            $rental = new Rental();
            $deleted = $rental->delete($data['id']);
            if ($deleted) {
                return View::redirect('rental');
            } else {
                return View::render('error', ['message' => 'Delete failed!']);
            }
        }
    }
}
