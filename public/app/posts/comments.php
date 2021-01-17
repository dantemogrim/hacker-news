<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Check if the user is logged in - otherwise redirect.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/login.php');
endif;

if (isset($_POST['comment'])) :
    $comment = trim(filter_var($_POST['comment'], FILTER_SANITIZE_STRING));

    if (empty($comment)) {
        echo 'You need to type something in order to submit your comment.';

        exit();
        // redirect('/gui-register.php');
    }

    $userId = $_SESSION['loggedIn']['userId'];
    $createdAt = date("Ymd");

    // Insert into SQLite database.
    $statement = $pdo->prepare('INSERT INTO comments (comment_author, text, comment_created)
    VALUES (:comment_author, :text, :comment_created)');

    $statement->bindParam(':comment_author', $comment_author, PDO::PARAM_STR);
    $statement->bindParam(':text', $text, PDO::PARAM_STR);
    $statement->bindParam(':comment_created', $createdAt, PDO::PARAM_STR);
    $statement->execute();

endif;
redirect('/');
