<?php

namespace App\Modules;

class User extends DB {

    public function getUsers() {
        $users = $this->getList('SELECT login, password FROM users');
        return $users;
    }

    public static function new ($user) {
        GLOBAL $DB;
        $answer = false;

        try {
            $prepare = $DB->prepare('INSERT INTO users (name, login, password, role) VALUES(:name, :login, :password, :role)');
            $prepare->bindValue(':name', $user["name"]);
            $prepare->bindValue(':login', $user["login"]);
            $prepare->bindValue(':password',  password_hash($user["password"], PASSWORD_ARGON2I));
            $prepare->bindValue(':role',  $user["role"]);
            $res = $prepare->execute();
            
        } catch (\Exception $e) {
            $res = $e->getBody();
        }

        return $res;
    }

}