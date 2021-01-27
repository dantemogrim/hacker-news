<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Check if user got here properly.
if (!isset($_SESSION['loggedIn'])) {
    redirect('/public/front/users/gui-ls-login.php');
}

if (isset($_POST['post-update'], $_POST['post_id'], $_POST['user_id'])) {
    $updatedPost = trim(filter_var($_POST['post-update'], FILTER_SANITIZE_STRING));
    $postId = (int)filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);
    $posterId = (int)filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $userId = (int)$_SESSION['loggedIn']['id'];

    if ($posterId !== $userId) {
        redirect('/public/index.php');
    }

    $statement = $pdo->prepare("UPDATE posts SET description = :description WHERE id = :post_id AND user_id = :user_id");
    $statement->bindParam(':description', $updatedPost, PDO::PARAM_STR);
    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->execute();

    setSessionData($userId, $pdo);
}

redirect('/../public/index.php');
