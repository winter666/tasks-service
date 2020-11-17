<form class="form" method="POST" action="/app/handlers/authorize.php">
    <input type="hidden" name="action" value="authorize">
    <div class="form-group">
        <label>Your Email</label>
        <input type="email" name="login" class="form-control">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="message-report">
    </div>
</form>