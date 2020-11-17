<?php
use App\Modules\Auth;


function auth() {
    return Auth::isAuth();
}