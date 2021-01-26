<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Check if user got here properly.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif;

// Checking that everything from register is properly filled out.
if (isset($_POST['current-email'], $_POST['new-email'])) {
    $currentEmail = trim(filter_var($_POST['current-email'], FILTER_SANITIZE_EMAIL));
    $newEmail = trim(filter_var($_POST['new-email'], FILTER_SANITIZE_EMAIL));
    $id = (int)$_SESSION['loggedIn']['id'];


    if (empty($currentEmail) || empty($newEmail)) {
        echo 'Fill in all the fields, please.';
        exit();
    }

    if ($currentEmail !== $_SESSION['loggedIn']['email']) {
        echo 'Honey, the current email doesn\'t match the original one registered to your account. Look it over and get it right, please.';
        exit();
    }

    if ($newEmail === $_SESSION['loggedIn']['email']) {
        echo 'Honey, this e-mail is already the one registered to your account. Now go on, get, try another one.';
        exit();
    }

    // Checking if e-mail already exists in database.
    $statement = $pdo->prepare('SELECT email FROM users WHERE email = :email');
    $statement->bindParam(':email', $newEmail, PDO::PARAM_STR);
    $statement->execute();
    $checkEmail = $statement->fetch(PDO::FETCH_ASSOC);
    if ($checkEmail && $checkEmail['email'] === $newEmail) {
        echo 'We\'re sorry. The new e-mail your attempting to switch to is already assigned to one of our users. Please, try another one.';
        exit();
    };

    // If everything above goes through, update e-mail.
    $sql = "UPDATE users SET email = :email WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':email', $newEmail, PDO::PARAM_STR);
    $statement->execute();

    setSessionData($id, $pdo);

    // Success confirmation.
    redirect('../../front/users/gui-confirm-email.php');
};

echo 'Something went wrong. Please try again';
exit();
// If things don't go through - take the user back to the register page.
redirect('../../front/users/gui-profile.php');
