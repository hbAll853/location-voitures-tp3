<?php
namespace App\Controllers;

use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Mail;
use App\Providers\Auth;
use App\Providers\Logger;
use App\Models\Privilege;
use App\Models\User;

class UserController {

    public function __construct(){
       
    }

    public function create(){
        Logger::enregistrer();
        $privilege = new Privilege;
        $privileges = $privilege->select(); 
        // print_r($privileges);
        // die();
        return View::render('user/create', ['privileges' => $privileges]);
    }

    public function store($data){
        $validator = new Validator;
        $validator->field('username', $data['username'])->min(2)->max(50);
        $validator->field('password', $data['password'])->min(6)->max(50);
        $validator->field('email', $data['email'])->min(2)->max(50)->email()->email()->unique('User');
        $validator->field('privilege_id', $data['privilege_id'], 'Privilege')->required();

        if($validator->isSuccess()){
            $user = new User;
            $data['password'] =  $user->hashPassword($data['password']);
            $insert = $user->insert($data);
            return View::redirect('login');
        }else{
            $errors = $validator->getErrors();
            // print_r($errors);
            $privilege = new Privilege;
            $privileges = $privilege->select();
            return View::render('user/create', ['errors'=>$errors, 'user'=>$data,'privileges' => $privileges]);
        }

    }


    public function journal()
    {
        Logger::enregistrer();

        $journal = [];

        if (file_exists('logs/journal.txt')) {
            $lignes = file('logs/journal.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lignes as $ligne) {
                [$ip, $date, $username, $page] = explode("\t", $ligne);
                $journal[] = [
                    'ip' => htmlspecialchars($ip),
                    'date' => htmlspecialchars($date),
                    'username' => htmlspecialchars($username),
                    'page' => htmlspecialchars($page),
                ];
            }
        }

        return View::render('user/journal', ['journal' => $journal]);
    }

    public function getMailForm(){
        Logger::enregistrer();
        return View::render('user/mailForm');
    }



}