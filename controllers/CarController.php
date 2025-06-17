<?php
namespace App\Controllers;

use App\Models\Car;
use App\Providers\View;
use App\Providers\Validator;

class CarController {
    public function index() {
        $car = new Car();
        $cars = $car->select();
        return View::render('car/index', ['cars' => $cars]);
    }

    public function show($data) {
        if (isset($data['id'])) {
            $car = new Car();
            $carData = $car->selectId($data['id']);
            if ($carData) {
                return View::render('car/show', ['car' => $carData]);
            } else {
                return View::render('error', ['message' => 'Car not found!']);
            }
        }
    }

    public function create() {
        return View::render('car/create');
    }

    public function store($data) {
        $validator = new Validator();
        $validator->field('brand', $data['brand'])->required()->max(50);
        $validator->field('model', $data['model'])->required()->max(50);
        $validator->field('year', $data['year'])->required();
        $validator->field('daily_price', $data['daily_price'])->required();

        if ($validator->isSuccess()) {
            $car = new Car();
            $insertId = $car->insert($data);
            return View::redirect('car');
        } else {
            $errors = $validator->getErrors();
            return View::render('car/create', ['errors' => $errors, 'car' => $data]);
        }
    }

    public function edit($data) {
        if (isset($data['id'])) {
            $car = new Car();
            $carData = $car->selectId($data['id']);
            if ($carData) {
                return View::render('car/edit', ['car' => $carData]);
            } else {
                return View::render('error', ['message' => 'Car not found!']);
            }
        }
    }

    public function update($data) {
        $car = new Car();
        $updated = $car->update($data, $data['id']);
        if ($updated) {
            return View::redirect('car');
        } else {
            return View::render('error', ['message' => 'Update failed!']);
        }
    }

    public function delete($data) {
        if (isset($data['id'])) {
            $car = new Car();
            $deleted = $car->delete($data['id']);
            if ($deleted) {
                return View::redirect('car');
            } else {
                return View::render('error', ['message' => 'Delete failed!']);
            }
        }
    }
}
