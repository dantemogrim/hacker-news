<?php require __DIR__ . '/../../header.php'; ?>

<?php
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif; ?>

<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Post deleted!</h4>
    <p>You have now successfully deleted your post.</p>
    <hr>
    <p class="mb-0">Have a great day!</p>
</div>
