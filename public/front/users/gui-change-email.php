<?php require __DIR__ . '/../../header.php'; ?>

<?php
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif; ?>

<h3>Here you can change your e-mail.</h3>
<br>
<form action="/public/back/users/change-email.php" method="post">
    <div class="mb-3">
        <label for="current-email" class="form-label">Your current e-mail:</label>
        <input type="email" class="form-control" id="current-email" name="current-email">
    </div>
    <div class="mb-3">
        <label for="new-email" class="form-label">Your new e-mail:</label>
        <input type="email" class="form-control" id="new-email" name="new-email">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
