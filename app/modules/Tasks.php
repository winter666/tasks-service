<?php

namespace App\Modules;


use App\Modules\Auth;

class Tasks extends DB {

    private $CURRENT_STATUS = 'current';
    private $COMPLETE_STATUS = 'complete';
    private $FAILED_STATUS = 'failed';

    public function getTasksListByUserId($userId, $status) {
        if (Auth::isAuth()) {
            // Тута где то че то не так..
            GLOBAL $DB;
            $prepare = $DB->prepare('SELECT * FROM tasks WHERE user_id = :user_id AND status = :status');
            $prepare->bindValue(':user_id', $userId);
            $prepare->bindValue(':status', $status);
            $prepare->execute();
            $res = $prepare->fetchAll();
            return  $res;
        }
        return false;
    }

    public function getCurrentStatus() {
        return $this->CURRENT_STATUS;
    }

    public function getCompleteStatus() {
        return $this->COMPLETE_STATUS;
    }

    public function getFailedtatus() {
        return $this->FAILED_STATUS;
    }

}