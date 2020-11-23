<?php

namespace App\Modules\TaskModel;

use App\Modules\DB;
use App\Modules\Auth;

class Model extends DB {

    /**
    * @method create
    */
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

    /**
     * @method update
     */
    public function updateStatus($taskId, $status) {
        GLOBAL $DB;

        $prepare = $DB->prepare('UPDATE tasks SET status = :status WHERE id = :id');
        $prepare->bindValue(':status', $status);
        $prepare->bindValue(':id', $taskId);
        $res = $prepare->execute();

        return $res;
    }

    /**
     * @method delete
     */
    public function delete($id) {
        GLOBAL $DB;

        $prepare = $DB->prepare('DELETE FROM tasks WHERE id = :id');
        $prepare->bindValue(':id', $id);
        $res = $prepare->execute();

        return $res;
    }


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
                    tasks.id as task_id,
                    tasks.name as task_name, 
                    tasks.user_id, 
                    tasks.description as description, 
                    tasks.assigner_id, 
                    tasks.status as status, 
                    users.id, 
                    users.name as user_name
                FROM tasks 
                LEFT JOIN users ON tasks.user_id = users.id
                WHERE tasks.assigner_id = :assigner_id 
                ORDER BY tasks.id DESC');
            $prepare->bindValue(':assigner_id', $assignerId);
            $prepare->execute();
            $res = $prepare->fetchAll();
            return  $res;
        }
        return false;
    }


}