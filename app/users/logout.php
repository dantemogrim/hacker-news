<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Destroy the logged in session and redirect the user.
unset($_SESSION['user']);

redirect('/');
