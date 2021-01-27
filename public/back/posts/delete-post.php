<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Check if user got here properly.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif;

if (isset($_POST['post_id'], $_POST['user_id'])) {
    $postId = trim(filter_var($_POST['post_id'], FILTER_SANITIZE_STRING));
    $authorId = (int)trim(filter_var($_POST['user_id'], FILTER_SANITIZE_STRING));
    $id = (int)$_SESSION['loggedIn']['id'];

    if ($authorId !== $id) {
        echo 'Uh-oh! Spaghetti-o!';
        exit();
        redirect('/../public/index.php');
    }

    $statement = $pdo->prepare("DELETE FROM posts WHERE id = :id");
    $statement->bindParam(':id', $postId, PDO::PARAM_INT);
    $statement->execute();

    $statement = $pdo->prepare("DELETE FROM comments WHERE post_id = :id");
    $statement->bindParam(':id', $postId, PDO::PARAM_INT);
    $statement->execute();

    $statement = $pdo->prepare("DELETE FROM smiles WHERE post_id = :id");
    $statement->bindParam(':id', $postId, PDO::PARAM_INT);
    $statement->execute();

    setSessionData($id, $pdo);
}

redirect('/../public/front/posts/gui-confirm-delete.php');
