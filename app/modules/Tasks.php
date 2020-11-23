<?php

namespace App\Modules;


use App\Modules\Auth;

class Tasks extends DB {

    private $CURRENT_STATUS = 'current';
    private $COMPLETE_STATUS = 'complete';
    private $FAILED_STATUS = 'failed';

    public function getTasksListByUserId($userId, $status) {
        if (Auth::isAuth()) {
            GLOBAL $DB;
            $prepare = $DB->prepare('SELECT * FROM tasks WHERE user_id = :user_id AND status = :status ORDER BY id DESC');
            $prepare->bindValue(':user_id', $userId);
            $prepare->bindValue(':status', $status);
            $prepare->execute();
            $res = $prepare->fetchAll();
            return  $res;
        }
        return false;
    }

    public function getTasksListByAssignerId($assignerId) {
        if (Auth::isAuth()) {
            GLOBAL $DB;
            $prepare = $DB
                ->prepare('SELECT
                    tasks.name as task_name, 
                    tasks.user_id, 
                    tasks.description as description, 
                    tasks.assigner_id, 
                    tasks.status as status, 
                    users.id, 
                    users.name as user_name
                FROM tasks 
                LEFT JOIN users ON tasks.user_id = users.id
                WHERE tasks.assigner_id = :assigner_id ');
            $prepare->bindValue(':assigner_id', $assignerId);
            $prepare->execute();
            $res = $prepare->fetchAll();
            return  $res;
        }
        return false;
    }

    public function new ($task) {

        GLOBAL $DB;

        $prepare = $DB->prepare('INSERT INTO tasks (name, description, user_id, assigner_id, status) VALUES(:name, :description, :user_id, :assigner_id, :status)');
        $prepare->bindValue(':name', $task['name']);
        $prepare->bindValue(':description', $task['description']);
        $prepare->bindValue(':user_id', $task['user_id']);
        $prepare->bindValue(':assigner_id', $task['assigner_id']);
        $prepare->bindValue(':status', $task['status']);
        $res = $prepare->execute();

        return $res;
    }


    public function makeCurrent ($taskName, $taskDescription, $userId, $assignId) {

        if (Auth::isAuth()) {

            $requiries = Validator::make([
                'name' => $taskName,
                'user_id' => $userId,
                'assigner_id' => $assignId
            ]);
            
            if ($requiries['result']) {

                $res = $this->new([
                    'name' => $taskName,
                    'description' => $taskDescription,
                    'user_id' => $userId,
                    'assigner_id' => $assignId,
                    'status' => $this->CURRENT_STATUS,
                ]);

                return ['result' => $res, 'message' => ($res) ? 'Assigned succesfuly' : 'Error'];
            }

            return $requiries;
        }
        return ['result' => false, 'message' => 'Unauthorized'];
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