<div class="card-header" id="comletedTasks">
    <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsTwo" aria-expanded="true" aria-controls="collapsTwo">
            Completed: <span>(<?= ($completeTasks) ? count($completeTasks) : 0 ?>)</span>
        </button>
    </h5>
</div>

<div id="collapsTwo" class="collapse" aria-labelledby="comletedTasks" data-parent="#accordion">
    <div class="card-body">
        <?php if (!empty($completeTasks)): ?>
            <?php foreach($completeTasks as $task): ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $task['name'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Status: <span class="badge badge-success"><?= $task['status'] ?></span></h6>
                        <p class="card-text">
                            <?= $task['description'] ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <!-- <form method="POST" action="/app/handlers/taskHandler.php" id="passCheckWork">
                            <input type="success" class="btn btn-primary btn-sm" value="Pass for check">
                        </form> -->
                    </div>
                </div>
            <?php endforeach; ?> 
        <?php else: ?>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/tasks/components/task-empty.php'); ?>    
        <?php endif; ?>
    </div>
</div>