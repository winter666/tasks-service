<?php

namespace App\Modules;

use App\Modules\TaskModel\Model;
use App\Modules\Auth;
use App\Modules\Validator;

class Tasks extends Model {

    private $CURRENT_STATUS = 'current';
    private $COMPLETE_STATUS = 'completed';
    private $FAILED_STATUS = 'failed';
    private $NEED_CHECK = 'need check';

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

    public function toggleStatus($taskId, $status) {
        $requiries = Validator::make([
            'task_id' => $taskId,
            'status' => $status
        ]);

        if ($requiries['result']) {
            $res = $this->updateStatus($taskId, $status);
            return ['result' => $res, 'message' => ($res) ? 'Success: Task status is ' . $status  : 'Error: Cannot change status of task'];
        }

        return $requires;
    }

    public function deleteTask($taskId) {
        $requires = Validator::make([
            'task_id' => $taskId,
        ]);

        if ($requires['result']) {
            $res = $this->delete($taskId);
            return ['result' => $res, 'message' => ($res) ? 'Success' : 'Error'];
        }

        return $requiries;
    }

    // Getters
    public function getCurrentStatus() {
        return $this->CURRENT_STATUS;
    }

    public function getCompleteStatus() {
        return $this->COMPLETE_STATUS;
    }

    public function getFailedtatus() {
        return $this->FAILED_STATUS;
    }

    public function getCheckStatus() {
        return $this->NEED_CHECK;
    }

}