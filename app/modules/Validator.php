<?php

namespace App\Modules;

class Validator {

    public static function make (array $required) {
        foreach ($required as $key => $value) {
            if (empty(trim($value))) {
                return ['result' => false, 'message' => 'Missing required field - ' . $key];
            }
        }
        return ['result' => true];
    }
}