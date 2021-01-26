<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Check if user got here properly.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif;

if (isset($_POST['post_id'], $_POST['user_id'])) {
    $comment = trim(filter_var($_POST['post_id'], FILTER_SANITIZE_STRING));
    $author = trim(filter_var($_POST['user_id'], FILTER_SANITIZE_STRING));
    $id = (int)$_SESSION['loggedIn']['id'];

    $statement = $pdo->prepare("UPDATE comments SET text = :text WHERE id = :id");
    $statement->bindParam(':id', $post, PDO::PARAM_INT);
    $statement->execute();

    // $statement = $pdo->prepare("DELETE FROM comments WHERE = :id");
    // $statement->bindParam(':id', $post, PDO::PARAM_INT);
    // $statement->execute();

    // $statement = $pdo->prepare("DELETE FROM smiles WHERE id = :id");
    // $statement->bindParam(':id', $post, PDO::PARAM_INT);
    // $statement->execute();

    setSessionData($id, $pdo);
}

redirect('/../public/index.php');
