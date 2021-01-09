<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$errors = [];
//or $registerErrors = "";

// Assuring that user got here by filling out the forms properly.
if (isset($_POST['email'], $_POST['username'], $_POST['passphrase'])) {

    // Sanitizing station. Filter. Hash etc.
    $email = strtolower(trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)));
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $passphrase = password_hash($_POST['passphrase'], PASSWORD_DEFAULT);

    // is the e-mail field filled in?
    if ($email === '') {
        $errors[] = 'Sorry, the e-mail field was empty.. Try again.';
    }

    $emailDuplicateCheck = users_email($email, $pdo);
    if (!empty($emailDuplicateCheck)) {
        $_SESSION['error'] = 'That e-mail is already registered to one of our users. Please try again.';
        redirect('/gui-register.php');
    }

    $userDuplicateCheck = users_alias($username, $pdo);
    if (!empty($userDuplicateCheck)) {
        $_SESSION['error'] = 'That alias is already registered to one of our users. Please try again.';
        redirect('/gui-register.php');
    }
    // If username already exists in the database - throw an error.
    //$usernameCheckForDoubles = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    //$usernameAlreadyExists = $usernameCheckForDoubles->fetch(PDO::FETCH_ASSOC);
    //if ($usernameAlreadyExists) {
    //  $_SESSION['error'] = ['The username already exists. Try something else.'];
    //redirect('/gui-login.php');
    // }




    // Does the email already exist in the database?



    // Does the username already exist in the database?




    // Prepare, bind, execute and insert to database file.
    $sql = "INSERT INTO users (email, username, passphrase) VALUES (:email, :username, :passphrase)";
    $statement = $pdo->prepare($sql);

    $statement->bindParam(':avatar', $avatar, PDO::PARAM_STR);
    $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
    $statement->bindParam(':comments', $comment, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':passphrase', $passphrase, PDO::PARAM_STR);
    $statement->bindParam(':posts', $post, PDO::PARAM_STR);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':votes', $vote);

    $statement->execute();

    $user = $statement->fetchAll(PDO::FETCH_ASSOC);

    // The user should now be logged in.
    // $_SESSION['loggedIn'] = [];


    redirect('/gui-login.php');
}
