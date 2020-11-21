<div class="container">
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