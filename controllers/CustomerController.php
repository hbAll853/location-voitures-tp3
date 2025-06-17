<?php
namespace App\Controllers;

use App\Models\Customer;
use App\Providers\View;
use App\Providers\Validator;

class CustomerController {
    public function index() {
        $customer = new Customer();
        $customers = $customer->select();
        return View::render('customer/index', ['customers' => $customers]);
    }

    public function show($data) {
        if (isset($data['id'])) {
            $customer = new Customer();
            $customerData = $customer->selectId($data['id']);
            if ($customerData) {
                return View::render('customer/show', ['customer' => $customerData]);
            } else {
                return View::render('error', ['message' => 'Customer not found!']);
            }
        }
    }

    public function create() {
        return View::render('customer/create');
    }

    public function store($data) {
        $validator = new Validator();
        $validator->field('first_name', $data['first_name'])->required()->max(50);
        $validator->field('last_name', $data['last_name'])->required()->max(50);
        $validator->field('email', $data['email'])->required()->max(100);
        $validator->field('phone', $data['phone'])->required()->max(20);

        if ($validator->isSuccess()) {
            $customer = new Customer();
            $insertId = $customer->insert($data);
            return View::redirect('customer');
        } else {
            $errors = $validator->getErrors();
            return View::render('customer/create', ['errors' => $errors, 'customer' => $data]);
        }
    }

    public function edit($data) {
        if (isset($data['id'])) {
            $customer = new Customer();
            $customerData = $customer->selectId($data['id']);
            if ($customerData) {
                return View::render('customer/edit', ['customer' => $customerData]);
            } else {
                return View::render('error', ['message' => 'Customer not found!']);
            }
        }
    }

    public function update($data) {
        $customer = new Customer();
        $updated = $customer->update($data, $data['id']);
        if ($updated) {
            return View::redirect('customer');
        } else {
            return View::render('error', ['message' => 'Update failed!']);
        }
    }

    public function delete($data) {
        if (isset($data['id'])) {
            $customer = new Customer();
            $deleted = $customer->delete($data['id']);
            if ($deleted) {
                return View::redirect('customer');
            } else {
                return View::render('error', ['message' => 'Delete failed!']);
            }
        }
    }
}
