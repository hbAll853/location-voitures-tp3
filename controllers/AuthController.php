<?php
namespace App\Controllers;

use App\Providers\View;
use App\Providers\Validator;
use App\Models\User;
use App\Providers\Auth;
use App\Providers\Logger;

class AuthController{
    
    public function index(){
        Logger::enregistrer();
        return View::render('auth/index');
    }
    public function store($data){
        $validator = new Validator;
        $validator->field('username', $data['username'])->min(2)->max(50);
        $validator->field('password', $data['password'])->min(6)->max(50);
         if($validator->isSuccess()){
            $user = new User;
            // $db_user est un user retournée de la bd et $data du formulaire login
            $checkuser = $user->checkUser($data['username'], $data['password']);
            if($checkuser){
                $db_user = $user -> unique('username', $data['username']);

                Auth::session_create($db_user['username'], $db_user['privilege_id'] );
                // echo '<pre>';
                // print_r($_SESSION);
                // echo '</pre>';
                return View::redirect('home/');
               
                
            }else{
                $errors['message'] = "Please check your credentials!";
                return View::render('auth/index', ['errors'=>$errors]);
            }

        }else{
            $errors = $validator->getErrors();
            return View::render('auth/index', ['errors'=>$errors]);
        }


    }
    public function delete(){
        session_destroy();
        return View::redirect('login');
    }
}

?>