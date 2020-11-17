
<?php if (auth()): ?>
    <form id="logout" method="POST" action="/app/handlers/authorize.php">
        <input type="hidden" name="action" value="logout">
        <button class="btn btn-primary" type="submit">Logout</button>
    </form>
<?php else: ?>
    <button class="btn btn-primary modal-loader" data-toggle="modal" data-target="#exampleModal" data-form="authorize">
        Login
    </button>
    <button class="btn btn-primary modal-loader" data-toggle="modal" data-target="#exampleModal" data-form="register">
        Register
    </button>
<?php endif; ?>