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

            <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/tasks/components/tabs/my-tasks.php'); ?>

        </div>

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/tasks/components/tabs/profile.php'); ?>

        </div>

        <?php if (admin()) : ?>
            <div class="tab-pane fade" id="tasksTracking" role="tabpanel" aria-labelledby="tasksTracking-tab">

                <div class="btn_panel tasks-control">
                    <div class="form-group">
                        <button class="btn btn-primary modal-loader" data-toggle="modal" data-target="#exampleModal" data-form="create_task">Assign a task</button>
                    </div>
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/tasks/components/filter.php'); ?> 
                </div>   

                <div id="tableAssignTasks">
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/tasks/components/tasks-track/table-assign.php'); ?>
                </div>
            </div>
        <?php endif; ?>    

    </div>
</div>