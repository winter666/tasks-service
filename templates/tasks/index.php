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
                <a class="nav-link" id="checkWork-tab" data-toggle="tab" href="#checkWork" role="tab" aria-controls="checkWork" aria-selected="false">Check work</a>
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
            <div class="tab-pane fade" id="checkWork" role="tabpanel" aria-labelledby="checkWork-tab">

                <div class="btn_panel tasks-control">
                    <button class="btn btn-primary modal-loader" data-toggle="modal" data-target="#exampleModal" data-form="create_task">Assign a task</button>
                </div>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>User name</th>
                            <th>Task</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($assignedTasks as $task): ?>
                            <tr>
                                <td><?= $task['user_name'] ?> (<?= $task['user_id'] ?>)</td>
                                <td><?= $task['task_name'] ?></td>
                                <td><?= $task['status'] ?></td>
                                <td><a href="/?page=task&show=<?= $task['task_id'] ?>">Show</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>    

    </div>
</div>