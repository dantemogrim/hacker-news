<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php'; // Connect to database.

// Check if e-mail & passphrase exist in the post request.
if (isset($_POST['username'], $_POST['passphrase'])) {
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $passphrase = $_POST['passphrase'];

    // Check if any of the login fields are empty.
    if (empty($username) || empty($passphrase)) {
        echo 'Fill out all of the fields.';
        exit();
        // redirect('/gui-ls-login.php');
    }

    // Check if the actual email already exists within the database.
    $sql = "SELECT * FROM users WHERE username = :username";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo 'There is no account registered to that username.';
        // redirect('/gui-ls-login.php');
        exit();
    }

    if (!password_verify($passphrase, $user['passphrase'])) {
        echo 'Wrong password.';
        // redirect('/gui-ls-login.php');
        exit();
    }
    // If all goes well, create a session for the user as logged in.
    if (isset($user['passphrase']) && password_verify($passphrase, $user['passphrase'])) {
        $_SESSION['loggedIn'] = [
            'username' => $user['username'],
            'avatar' => $user['avatar'],
            'email' => $user['email'],
            'bio' => $user['bio'],
            'userId' => $user['id']
        ];
    }

    redirect('/public/index.php');
};

// If things go south, take the user back to the login page.
redirect('/gui-ls-login.php');
