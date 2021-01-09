<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

// ======================================================
//                  CATEGORY LARGE FONT
// ======================================================


// Is the user already logged in? If not - redirect them to the login page.
function loggedIn()
{
    if (!isset($_SESSION['user'])) {
        redirect('/login,php');
    }
}

// ------------------------------------------------------
//                  E-MAIL RELATED
// ------------------------------------------------------

// Retrieve the data from the users e-mail.

/*function users_email(string $email, object $pdo): array
{
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $statement = bindParam(':email, $email, PDO::PARAM_STR');
    $statement->execute();
    $status = $statement->(PDO::FETCH_ASSOC);
    if ($status) {
        return $status;
    }
    return $status = [];

}
*/

// ------------------------------------------------------
//                  USERNAME RELATED
// ------------------------------------------------------

// Retrieve the data from the users alias.
/*
function users_alias(string $username, object $pdo): array
{
    $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $statement = bindParam(':username, $username, PDO::PARAM_STR');
    $statement->execute();
    $status = $statement->(PDO::FETCH_ASSOC);
    if ($status) {
        return $status;
    }
    return $status = [];

}
*/
/* Detailed explanation of something.
* That should require.
* Several paragraphs.
* Yeah.
*/






/* 
*
*
*
*/