<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Check if user got here properly.
if (!isset($_SESSION['loggedIn'])) {
    redirect('/public/front/users/gui-ls-login.php');
}

if (isset($_POST['comment_id'], $_POST['user_id'], $_POST['comment-update'])) {
    $commentId = (int)filter_var($_POST['comment_id'], FILTER_SANITIZE_NUMBER_INT);
    $author = (int)filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $commentUpdate = trim(filter_var($_POST['comment-update'], FILTER_SANITIZE_STRING));
    $id = (int)$_SESSION['loggedIn']['id'];

    if ($author !== $id) {
        redirect('/../public/index.php');
    }

    $statement = $pdo->prepare("UPDATE comments SET text = :text WHERE id = :id AND user_id = :user_id");
    $statement->bindParam(':id', $commentId, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $author, PDO::PARAM_INT);
    $statement->bindParam(':text', $commentUpdate, PDO::PARAM_STR);
    $statement->execute();

    setSessionData($id, $pdo);
}

redirect('/../public/index.php');
