<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Check if user got here properly.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif;

if (isset($_POST['bio'])) {
    $bio = trim(filter_var($_POST['bio'], FILTER_SANITIZE_STRING));
    $id = (int)$_SESSION['loggedIn']['id'];

    $statement = $pdo->prepare("UPDATE users SET bio = :bio WHERE id = :id");
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
    $statement->execute();

    setSessionData($id, $pdo);
}


redirect('/public/front/users/gui-profile.php');
