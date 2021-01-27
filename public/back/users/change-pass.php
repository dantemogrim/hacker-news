<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Check if user got here properly.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif;


// Checking that everything from register is properly filled out.
if (isset($_POST['current-pass'], $_POST['new-pass'])) {
    $currentPass = $_POST['current-pass'];
    $newPass = $_POST['new-pass'];
    $newPassHashed = password_hash($_POST['new-pass'], PASSWORD_DEFAULT);
    $id = (int)$_SESSION['loggedIn']['id'];

    if (empty($currentPass) || empty($newPass)) {
        echo 'Fill in all the fields, please.';

        redirect('/public/front/users/gui-change-pass.php');
    }

    if ($currentPass === $newPass) {
        echo 'You just typed the same value in the two different fields, ya silly. Try again.';

        redirect('/public/front/users/gui-change-pass.php');
    }

    $sql = "SELECT passphrase FROM users WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();
    $passphrase = $statement->fetch(PDO::FETCH_ASSOC);


    if (!password_verify($currentPass, $passphrase['passphrase'])) {
        echo 'Wrong password.';
        exit();
    }

    $sql = "UPDATE users SET passphrase = :passphrase WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':passphrase', $newPassHashed, PDO::PARAM_STR);
    $statement->execute();

    setSessionData($id, $pdo);
};

redirect('../../front/users/gui-confirm-pass.php');
