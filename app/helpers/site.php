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

function getMaskByStatus($status) {
    switch($status) {
        case 'current':
            return '<span class="badge badge-primary">' . $status . '</span>';
        case 'completed':
            return '<span class="badge badge-success">' . $status . '</span>';
        case 'failed':
            return '<span class="badge badge-danger">' . $status . '</span>';
        case 'need check':
            return '<span class="badge badge-warning">' . $status . '</span>';    
    }
    return  $status;
}

function user() {
    if (auth()) {
        $u = new User;
        $sessionUser = Session::get('auth');
        return $u->getById($sessionUser['id']);
    }
    return false;
}