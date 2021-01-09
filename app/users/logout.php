<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

session_unset($_SESSION['loggedIn']);
session_destroy($_SESSION['loggedIn']);
redirect('/gui-login.php');
