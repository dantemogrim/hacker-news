<?php require __DIR__ . '/../../header.php'; ?>

<?php
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif; ?>

<h3>Here you can change your passphrase.</h3>
<br>
<form action="/public/back/users/change-pass.php" method="post">
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Current passphrase:</label>
        <input type="password" class="form-control" id="current-pass" name="current-pass">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">New passphrase:</label>
        <input type="password" class="form-control" id="new-pass" name="new-pass">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
