<div class="container">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="myTasks-tab" data-toggle="tab" href="#myTasks" role="tab" aria-controls="myTasks" aria-selected="true">My tasks</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
        </li>
        <?php if (admin()) : ?>
            <li class="nav-item">
                <a class="nav-link" id="tasksTracking-tab" data-toggle="tab" href="#tasksTracking" role="tab" aria-controls="tasksTracking" aria-selected="false">Task Tracking</a>
            </li>
        <?php endif; ?>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="myTasks" role="tabpanel" aria-labelledby="myTasks-tab">
            <div id="accordion">
                <div class="card current">

                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/tasks/components/collapse-current.php'); ?>  

                </div>       
                <div class="card comleted">

                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/tasks/components/collapse-complete.php'); ?>  

                </div>
                <div class="card failedTasks">

                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/tasks/components/collapse-failed.php'); ?>
                    
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">2</div>

        <?php if (admin()) : ?>
            <div class="tab-pane fade" id="tasksTracking" role="tabpanel" aria-labelledby="tasksTracking-tab">

                <div class="btn_panel tasks-control">
                    <button class="btn btn-primary modal-loader" data-toggle="modal" data-target="#exampleModal" data-form="create_task">Assign a task</button>
                </div>
                <div id="tableAssignTasks">
                    <table class="table">
                        <thead class="thead-dark ta-center">
                            <tr class="ta-center">
                                <th>User name</th>
                                <th>Task</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="ta-center">
                            <?php foreach ($assignedTasks as $task): ?>
                                <tr>
                                    <td><?= $task['user_name'] ?> (<?= $task['user_id'] ?>)</td>
                                    <td><?= $task['task_name'] ?></td>
                                    <td><?= getMaskByStatus($task['status']) ?></td>
                                    <td>
                                        <div class="d-flex flex-wrap justify-content-center">

                                            <div class="mr-4">
                                                <a class="btn btn-info" href="/?page=task&show=<?= $task['task_id'] ?>">Show</a>
                                            </div>

                                            <div class="mr-4">
                                                <form method="POST" action="/app/handlers/taskHandler.php" class="pass_work need_prove">
                                                    <input type="hidden" name="task_id" value="<?= $task['task_id'] ?>">
                                                    <input type="hidden" name="action" value="pass_tasks">
                                                    <div class="input-group">
                                                        <select class="form-control" name="status">
                                                            <option value="completed">Completed</option>
                                                            <option value="current">Current</option>
                                                            <option value="failed">Failed</option>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary">Make</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                            <div>
                                                <form method="POST" action="/app/handlers/taskHandler.php" class="pass_work need_prove">
                                                    <input type="hidden" name="task_id" value="<?= $task['task_id'] ?>">
                                                    <input type="hidden" name="action" value="delete">
                                                    <input type="submit" value="Delete" class="btn btn-danger">
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>    

    </div>
</div>