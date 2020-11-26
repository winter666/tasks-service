<form class="form form-task" method="POST" action="/app/handlers/taskHandler.php">
    <input type="hidden" name="action" value="create">
    <div class="form-group">
        <input class="form-control" placeholder="Task title" name="name">
    </div>
    <div class="form-group">
        <textarea class="form-control" placeholder="Task description" name="description"></textarea>
    </div>
    <div class="form-group">
        <select class="form-control" name="user_id">
            <?php foreach($data['users'] as $user): ?>
                <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="message-report"></div>
</form>