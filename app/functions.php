<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

function loggedIn()
{
    if (!isset($_SESSION['loggedIn'])) {
        redirect('/login,php');
    }
}
