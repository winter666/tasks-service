<?php
namespace App\Modules;

require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/User.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/Validator.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/Session.php');

use App\Modules\User;
use App\Modules\Validator;
use App\Modules\Session;

class Auth {

    private $ROLE_ADMIN = 1;
    private $ROLE_WORKER = 2;
    private $ROLE_USER = 3;

    public function authorize($login, $password, $validated = false) {
        $requiries['result'] = true;

        if (!$validated) {
            $requiries = Validator::make([
                'login' => $login, 
                'password' => $password, 
            ]);
        }

        if ($requiries['result']) {
            $user = new User();

            $users = $user->getUsers();
            $role = 3;
            foreach ($users as $user) {
                if ($user['login'] === $login) {
                    $verified = password_verify($password, $user['password']);
                    $role = ($verified) ? $user['role'] : $role;
                    $user_id = $user['id'];
                }    
            }
            if ($verified) {
                $sessionUser = ['id' => $user_id, 'login' => $login, 'role' => $role];
                Session::set('auth', $sessionUser);
            }
            
            $answer['result'] = $verified;
            $answer['message'] = ($verified) ? 'You are logged in!' : 'Invalid Email or Password'; 
            return $answer;
        }

        return $requiries;
    }


    public function register($name, $login, $password, $confPass, $role = 1) {

        $requiries = Validator::make([
            'name' => $name, 
            'login' => $login, 
            'password' => $password, 
            'confirm_passord' => $confPass
        ]);

        if ($requiries['result']) {
            if ($this->confirmationPassword($password, $confPass)) {
                $result = User::new([
                    'name' => $name,
                    'login' => $login,
                    'password' => $password,
                    'role' => $this->ROLE_WORKER,
                ]);
                return ($result) ? $this->authorize($login, $password, true) : ['result' => false, 'message' => 'This email has been registred on another account'];
            }
            return ['result' => false, 'message' => 'Invalid confirmation password'];
        }
        return $requiries;
    }

    
    public static function logout() {
        $result = Session::delete('auth');
        $message = ($result) ? 'You are log out' : 'Error';
        return ['result' => $result, 'message' => $message]; 
    }


    private function confirmationPassword($pass, $conf) {
        return ($pass == $conf);
    }


    public static function isAuth() {

        $sessionUser = Session::get('auth');

        if (!empty($sessionUser)) {
            $u = new User;
            $user = $u->getById($sessionUser['id']);
            return $user;
        }

        return false;
    }

    public function isAdmin() {
        $sessionUser = Session::get('auth');

        if (!empty($sessionUser)) {
            return ($sessionUser['role'] == $this->ROLE_ADMIN);
        }

        return false;

    }

    
}