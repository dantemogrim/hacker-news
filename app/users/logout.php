<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

unset($_SESSION['loggedIn']);
redirect('/gui-login.php');


// Destroy the logged in session and redirect the user.


//redirect('/');
// header function instead? 