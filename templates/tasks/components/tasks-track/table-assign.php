<table class="table">
    <thead class="thead-dark ta-center">
        <tr class="ta-center">
            <th>User name</th>
            <th>Task</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="ta-center filter-area" data-filter="status" data-element-format="table">
        <?php foreach ($data['assignedTasks'] as $task): ?>
            <tr data-status="<?= $task['status'] ?>">
                <td><?= $task['user_name'] ?> (<?= $task['user_id'] ?>)</td>
                <td><?= $task['task_name'] ?></td>
                <td><textarea class="form-control" readonly><?= $task['description'] ?></textarea></td>
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
                                        <option value="completed" <?= ($task['status'] == 'completed') ? 'selected' : '' ?>>
                                            Completed
                                        </option>
                                        <option value="current" <?= ($task['status'] == 'current') ? 'selected' : '' ?>>
                                            Current
                                        </option>
                                        <option value="failed" <?= ($task['status'] == 'failed') ? 'selected' : '' ?>>
                                            Failed
                                        </option>
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