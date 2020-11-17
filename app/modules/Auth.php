<?php
namespace App\Modules;

require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/User.php');
use App\Modules\User;

class Auth {

    public function authorize($login, $password) {
        $user = new User();

        $users = $user->getUsers();
        
        // foreach ($users as $user) {
        //     if () {
                
        //     }    
        // }
    }

    public function register($name, $login, $password, $confPass, $role = 1) {

        if ($this->confirmationPassword($password, $confPass)) {
            $result = User::new([
                'name' => $name,
                'login' => $login,
                'password' => $password,
                'role' => $role,
            ]);
            return $answer = ($result) ? ['result' => true, 'message' => 'You are register!'] : ['result' => false, 'message' => 'Some error'];
        }
        return ['result' => false, 'message' => 'Invalid confirmation password'];
    }

    private function confirmationPassword($pass, $conf) {
        if ($pass != $conf) {
            return false;
        }
        return true;
    }
}