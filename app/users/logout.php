<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

session_destroy();
header('Location: gui-login.php');


// Destroy the logged in session and redirect the user.
//unset($_SESSION['user']);

//redirect('/');
// header function instead? 