<?php
use App\Modules\Auth;
use App\Modules\Session;
use App\Modules\User;

function auth() {
    return Auth::isAuth();
}

function admin() {
    $auth = new Auth();
    return $auth->isAdmin();
}

function user() {
    if (auth()) {
        $u = new User;
        $sessionUser = Session::get('auth');
        return $u->getById($sessionUser['id']);
    }
    return false;
}