<div class="card-header" id="failedTasks">
    <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree">
            Failed: <span>(<?= ($failedTasks) ? count($failedTasks) : 0 ?>)</span>
        </button>
    </h5>
</div>

<div id="collapseTree" class="collapse" aria-labelledby="failedTasks" data-parent="#accordion">
    <div class="card-body">
        <?php if (!empty($failedTasks)): ?>
            <?php foreach($failedTasks as $task): ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $task['name'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Status: <span class="badge badge-danger"><?= $task['status'] ?></span></h6>
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