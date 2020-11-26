
<div id="accordion">
    <div class="card current">

        <?php component('tasks', 'collapse-current', $data['currentTasks']); ?>

    </div>       
    <div class="card comleted">

        <?php component('tasks', 'collapse-complete', $data['completeTasks']); ?>  

    </div>
    <div class="card failedTasks">

        <?php component('tasks', 'collapse-failed', $data['failedTasks']); ?>
        
    </div>
</div>
