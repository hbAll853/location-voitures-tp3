<?php
namespace App\Providers;

use App\Providers\View;

class Auth {

    // quand on est connecté et ne prend pas en compte les privilèges.
    static public function session(){
        if(isset($_SESSION['username']) && isset($_SESSION['fingerPrint']) &&
        $_SESSION['fingerPrint'] === md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'])){
            return true;
        } else {
            return view::redirect('login');
            exit();
        }
    }
    

    // quand on est connecté et admin seulement
    public static function isAdminOnly() {
        Auth::session();

        if ($_SESSION['privilege_id'] != 1) {
            return View::render('error', ['message' => "Accès réservé à l'administrateur"]);
            exit;
        }
        else
            return true;
    }

    //quand on est connecté et client seulement
    public static function isClientOnly() {
        Auth::session();

        if ($_SESSION['privilege_id'] == 2) {
            return true;
        }
        else
            return false;
    }

    //créer les variables de session
    public static function session_create($username, $privilege_id){
     
        $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
        $_SESSION['username'] = $username;
        $_SESSION['privilege_id'] = $privilege_id;


    }


}

?>


