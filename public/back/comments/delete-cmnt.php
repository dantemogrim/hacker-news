<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Check if user got here properly.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif;

if (isset($_POST['post_id'], $_POST['user_id'], $_POST['comment_id'])) {
    $postId = trim(filter_var($_POST['post_id'], FILTER_SANITIZE_STRING));
    $authorId = (int)trim(filter_var($_POST['user_id'], FILTER_SANITIZE_STRING));
    $commentId = trim(filter_var($_POST['comment_id'], FILTER_SANITIZE_STRING));
    $id = (int)$_SESSION['loggedIn']['id'];

    if ($authorId !== $id) {
        echo 'UH-OH!';
        exit();
        redirect('/../public/index.php');
    }

    $statement = $pdo->prepare("DELETE FROM comments WHERE id = :comment_id");
    $statement->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
    $statement->execute();

    setSessionData($id, $pdo);
}

redirect('/public/index.php');
