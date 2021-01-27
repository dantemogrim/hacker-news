<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Check if the user is logged in - otherwise redirect.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif;

// Is the container properly filled out - if yes then sanitize.
if (isset($_POST['comment'], $_POST['post_id'])) {
    $text = trim(filter_var($_POST['comment'], FILTER_SANITIZE_STRING));
    $postId = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);
    $userId = $_SESSION['loggedIn']['id'];
    $createdAt = date("Ymd");

    // Insert into SQLite database.
    $statement = $pdo->prepare('INSERT INTO comments (user_id, post_id, text, comment_created)
    VALUES (:user_id, :post_id, :text, :comment_created)');

    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $statement->bindParam(':text', $text, PDO::PARAM_STR);
    $statement->bindParam(':comment_created', $createdAt, PDO::PARAM_STR);
    $statement->execute();
}
redirect("../../front/comments/gui-cmnt-section.php?post_id=$postId");
