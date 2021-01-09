<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$errors = [];
//or $registerErrors = "";

// Assuring that user got here by filling out the forms properly.
if (isset($_POST['email'], $_POST['username'], $_POST['passphrase'],)) {
    $email = strtolower(trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)));
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $passphrase = password_hash($_POST['passphrase'], PASSWORD_DEFAULT);

    if ($email === '') {
        $errors[] = 'Sorry, the e-mail field was empty.. Try again.';
    }












    //if (empty($email) || empty($username) || empty($passphrase)) {
    //  exit();
    // }


    // If username already exists in the database - throw an error.
    //$usernameCheckForDoubles = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    //$usernameAlreadyExists = $usernameCheckForDoubles->fetch(PDO::FETCH_ASSOC);
    //if ($usernameAlreadyExists) {
    //  $_SESSION['error'] = ['The username already exists. Try something else.'];
    //redirect('/gui-login.php');
    // }


    // If username already exists in the database - throw an error.



    // Prepare, bind, execute and insert to database file.
    $sql = "INSERT INTO users (email, username, passphrase) VALUES (:email, :username, :passphrase)";
    $statement = $pdo->prepare($sql);

    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':passphrase', $passphrase);

    $statement->execute();

    $user = $statement->fetchAll(PDO::FETCH_ASSOC);


    redirect('/gui-login.php');
}
