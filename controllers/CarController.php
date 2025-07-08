<?php
namespace App\Controllers;

use App\Models\Car;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;
use App\Providers\Logger;

class CarController {

    public function index() {
        Logger::enregistrer();
        //  Protection : utilisateur connecté
        

        $car = new Car();
        $cars = $car->select();
        return View::render('car/index', ['cars' => $cars]);
    }

    public function show($data) {
        // Pas besoin de protection ici si accessible à tous
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
        Logger::enregistrer();
        //  Connexion +  Admin
        if(Auth::isAdminOnly())
            return View::render('car/create');
    }

    public function store($data) {
        //  Connexion +  Admin
        if(Auth::isAdminOnly()){

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
    }

    public function edit($data) {
        Logger::enregistrer();
        //  Connexion +  Admin
      
        if(Auth::isAdminOnly()){

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
    }

    public function update($data) {
        //  Connexion +  Admin
        if(Auth::isAdminOnly()){
            $car = new Car();
            $updated = $car->update($data, $data['id']);
            if ($updated) {
                return View::redirect('car');
            } else {
                return View::render('error', ['message' => 'Update failed!']);
            }
        }
    }

    public function delete($data) {
        //  Connexion +  Admin
        if(Auth::isAdminOnly()){


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
}
