<?php require __DIR__ . '/../../header.php'; ?>

<?php
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif; ?>

<h3>Here you can delete your account.</h3>
<br>
<form action="/public/back/users/ls-delete.php" method="post">
    <div class="mb-3">
    <p>Do you want to delete your account and everything else you've done on the site?</p>
    </div>
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Delete Account</button>
</form>
