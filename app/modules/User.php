<?php

namespace App\Modules;

class User extends DB {


    public function getUsers() {
        $users = $this->getList('SELECT id, login, password, role FROM users');
        return $users;
    }

    public function getUserList() {
        $users = $this->getList('SELECT * FROM users');
        return $users;
    }

    public function getById($user_id) {
        GLOBAL $DB;
        $prepare = $DB->prepare('SELECT * FROM users WHERE id=:id');
        $prepare->bindValue(':id', $user_id);
        $prepare->execute();
        $res = $prepare->fetch();
        return $res;
    }

    public static function new ($user) {
        GLOBAL $DB;
        $answer = false;

        $prepare = $DB->prepare('INSERT INTO users (name, login, password, role) VALUES(:name, :login, :password, :role)');
        $prepare->bindValue(':name', $user["name"]);
        $prepare->bindValue(':login', $user["login"]);
        $prepare->bindValue(':password',  password_hash($user["password"], PASSWORD_ARGON2I));
        $prepare->bindValue(':role',  $user["role"]);
        $res = $prepare->execute();

        return $res;
    }

}