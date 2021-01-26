<?php require __DIR__ . '/../../header.php'; ?>

<?php
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif; ?>

<ul>
    <div class="alert alert-primary" role="alert">
        <a href="/public/front/users/gui-change-pass.php">
            <p> Do you want to change your passphrase? </p>
        </a>
    </div>

    <div class="alert alert-primary" role="alert">
        <a href="/public/front/users/gui-change-email.php">
            <p> Do you want to change your email? </p>
        </a>
    </div>


</ul>
