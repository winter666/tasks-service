<div class="card-header" id="currentTasks">
    <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Current: <span>(<?= ($data) ? count($data) : 0 ?>)</span>
        </button>
    </h5>
</div>

<div id="collapseOne" class="collapse show" aria-labelledby="currentTasks" data-parent="#accordion">
    <div class="card-body">
        <div class="message-report"></div>
        <?php if (!empty($data)): ?>
            <?php foreach($data as $task): ?>
                <div class="card task">
                    <div class="card-body">
                        <h5 class="card-title"><?= $task['name'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Status: <span class="badge badge-primary"><?= $task['status'] ?></span></h6>
                        <p class="card-text">
                            <?= $task['description'] ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <form method="POST" action="/app/handlers/taskHandler.php" class="pass_work">
                            <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                            <input type="hidden" name="action" value="pass_tasks">
                            <input type="submit" class="btn btn-primary btn-sm" value="Pass for check">
                            <div class="message-report"></div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?> 
        <?php else: ?>
            <?php component('tasks', 'task-empty'); ?>
        <?php endif; ?>
    </div>
</div> 