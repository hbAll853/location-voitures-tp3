<?php
namespace App\Models;
use App\Models\CRUD;
use App\Providers\Auth;

class User extends CRUD {
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = ['username', 'password', 'email', 'privilege_id' ];

    public function hashPassword($password, $cost = 10){
        $options = [
                'cost' => $cost
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options); 
    }

    public function checkUser($username, $password){
            $user = $this->unique('username',$username);
            if($user){
                if(password_verify($password, $user['password'])){
                    return true;
                }else{
                    return false;   
                }
            }else{
                return false; 
            }
    }

    public static function getUserIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // Can contain multiple IPs; the first is the real one
            return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
}