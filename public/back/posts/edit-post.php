<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Check if user got here properly.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif;

if (isset($_POST['post_update'])) {
    $post = trim(filter_var($_POST['post_update'], FILTER_SANITIZE_STRING));
    $id = (int)$_SESSION['loggedIn']['id'];

    $statement = $pdo->prepare("UPDATE posts SET description = :description WHERE id = :id");
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':description', $post, PDO::PARAM_STR);
    $statement->execute();

    die(var_dump($statement));

    // $statement = $pdo->prepare("UPDATE comments WHERE id = :id");
    // $statement->bindParam(':id', $post, PDO::PARAM_INT);
    // $statement->execute();

    // $statement = $pdo->prepare("UPDATE smiles WHERE id = :id");
    // $statement->bindParam(':id', $post, PDO::PARAM_INT);
    // $statement->execute();

    setSessionData($id, $pdo);
}

redirect('/../public/index.php');
