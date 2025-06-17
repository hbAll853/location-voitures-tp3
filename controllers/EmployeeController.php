<?php
namespace App\Controllers;

use App\Models\Employee;
use App\Providers\View;
use App\Providers\Validator;

class EmployeeController {
    public function index() {
        $employee = new Employee();
        $employees = $employee->select();
        return View::render('employee/index', ['employees' => $employees]);
    }

    public function show($data) {
        if (isset($data['id'])) {
            $employee = new Employee();
            $employeeData = $employee->selectId($data['id']);
            if ($employeeData) {
                return View::render('employee/show', ['employee' => $employeeData]);
            } else {
                return View::render('error', ['message' => 'Employee not found!']);
            }
        }
    }

    public function create() {
        return View::render('employee/create');
    }

    public function store($data) {
        $validator = new Validator();
        $validator->field('name', $data['name'])->required()->max(100);
        $validator->field('email', $data['email'])->required()->max(100);
        $validator->field('role', $data['role'])->required()->max(50);

        if ($validator->isSuccess()) {
            $employee = new Employee();
            $insertId = $employee->insert($data);
            return View::redirect('employee');
        } else {
            $errors = $validator->getErrors();
            return View::render('employee/create', ['errors' => $errors, 'employee' => $data]);
        }
    }

    public function edit($data) {
        if (isset($data['id'])) {
            $employee = new Employee();
            $employeeData = $employee->selectId($data['id']);
            if ($employeeData) {
                return View::render('employee/edit', ['employee' => $employeeData]);
            } else {
                return View::render('error', ['message' => 'Employee not found!']);
            }
        }
    }

    public function update($data) {
        $employee = new Employee();
        $updated = $employee->update($data, $data['id']);
        if ($updated) {
            return View::redirect('employee');
        } else {
            return View::render('error', ['message' => 'Update failed!']);
        }
    }

    public function delete($data) {
        if (isset($data['id'])) {
            $employee = new Employee();
            $deleted = $employee->delete($data['id']);
            if ($deleted) {
                return View::redirect('employee');
            } else {
                return View::render('error', ['message' => 'Delete failed!']);
            }
        }
    }
}
