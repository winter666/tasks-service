<?php
namespace App\Modules;

require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/User.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/Validator.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/Session.php');

use App\Modules\User;
use App\Modules\Validator;
use App\Modules\Session;

class Auth {

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
            
            foreach ($users as $user) {
                if ($user['login'] === $login) {
                    $verified = password_verify($password, $user['password']);
                }    
            }

            $sessionUser = ['id' => $user['id'], 'login' => $user['login']];

            Session::set('auth', $sessionUser);

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
                    'role' => $role,
                ]);
                return $this->authorize($login, $password, true);
                // return $answer = ($result) ? ['result' => true, 'message' => 'You are register!'] : ['result' => false, 'message' => 'This email has been registred on another account'];
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
}