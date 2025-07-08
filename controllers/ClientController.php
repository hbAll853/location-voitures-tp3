<?php
namespace App\Controllers;
use App\Models\Client;
use App\Models\City;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;
use App\Providers\Logger;

class ClientController{
    public function index(){
        Logger::enregistrer();
        $client = new Client;
        $clients = $client->select();
        print_r($_SESSION);
        return View::render('client/index', ['clients'=>$clients]);
    }

    public function show($data){
        Logger::enregistrer();
        if(isset($data['id']) && $data['id']!=null){
            $client = new Client;
            $selectId = $client->selectId($data['id']);
            if($selectId){
                // print_r($selectId);
                $city_id = $selectId['city_id'];
                //print_r($selectedCity);
                //die();
            }else{
                return View::render('error', ['message'=>'Client not found!']);
            }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }

    public function create(){
        Logger::enregistrer();
        if(Auth::isAdminOnly())
            return View::render('client/create');
    }

    public function store($data){
        if (Auth::isAdminOnly()){
            $validator = new Validator;
            $validator->field('name',$data['name'])->min(2)->max(10);
            $validator->field('address',$data['address'])->max(50);
            $validator->field('phone',$data['phone'])->max(20);
            $validator->field('zip_code',$data['zip_code'], 'zip code')->max(10);
            $validator->field('email',$data['email'])->max(45)->required();
            $validator->field('city_id',$data['city_id'], 'city')->required();


            if($validator->isSuccess()){
                $client = new Client;
                $insertClient = $client->insert($data);

                if( $insertClient){
                    return View::redirect('client/show?id='.$insertClient);
                }else{
                    return View::render('error', ['message'=>'404 not found!']);
                }
            }else{
                //retunr avec erreur;
                $errors = $validator->getErrors();

            }   
        }
    }

    public function edit($data){
        Logger::enregistrer();
        if (Auth::isAdminOnly()){
            if(isset($data['id']) && $data['id']!=null){
                $client = new Client;
                $selectId = $client->selectId($data['id']);
                if($selectId){
                }else{
                    return View::render('error', ['message'=>'Client not found!']);
                }
            }else{
                return View::render('error', ['message'=>'404 not found!']);
            }
        }
    }

    public function update($data, $get){
        if (Auth::isAdminOnly()){
            // print_r($data);
            // echo "<br>";
            // print_r($get);
            if(isset($get['id']) && $get['id']!=null){
                $validator = new Validator;
                $validator->field('name',$data['name'])->min(2)->max(10);
                $validator->field('address',$data['address'])->max(50);
                $validator->field('phone',$data['phone'])->max(20);
                $validator->field('zip_code',$data['zip_code'], 'zip code')->max(10);
                $validator->field('email',$data['email'])->max(45)->required();
                $validator->field('city_id',$data['city_id'], 'city')->required();


                if($validator->isSuccess()){
                    $client = new Client;
                    $update = $client->update($data, $get['id']);
                    if($update){
                        return View::redirect('clients');
                    }else{
                        return View::render('error', ['message'=>'Cannot  update!']);
                    }
                }else{
                    $errors = $validator->getErrors();
                    }
            }else{
                return View::render('error', ['message'=>'404 not found!']);
            }
        }
    }
    public function delete($data){
        if (Auth::isAdminOnly()){
            
            // print_r($data);
            // die();
            $client = new Client;
            $delete = $client->delete($data['id']);
            if($delete){
                return View::redirect('clients');
            }else{
                return View::render('error', ['message'=>'404 not found!']);
            }
        }
        

    }
}

?>