<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';
// Log out user.
session_unset();
session_destroy();
redirect('/public/front/gui-logout.php');
