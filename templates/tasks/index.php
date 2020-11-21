<div class="container">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="myTasks-tab" data-toggle="tab" href="#myTasks" role="tab" aria-controls="myTasks" aria-selected="true">My tasks</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
        </li>
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

        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">3</div>
        
    </div>
</div>