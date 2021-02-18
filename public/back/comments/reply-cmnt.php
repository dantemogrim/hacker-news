<?php

 declare(strict_types=1);

 require __DIR__ . '/../autoload.php';

 if (isset($_POST['reply'])) {
    $createdAt = date('Ymd H:i:s');
    $commentId = (int)filter_var($_POST['comment-id'], FILTER_SANITIZE_NUMBER_INT);
    $postId = (int)filter_var($_POST['post-id'], FILTER_SANITIZE_NUMBER_INT);
    $reply = trim(filter_var($_POST['reply'], FILTER_SANITIZE_STRING));
    $userId = (int)$_SESSION['loggedIn']['id'];
    $username = $_SESSION['loggedIn']['username'];

     $statement = $pdo->prepare('INSERT INTO replies (reply_created, comment_id, post_id, reply, user_id, username) 
         VALUES (:reply_created, :comment_id, :post_id, :reply, :user_id, :username)');

     if (!$statement) {
         die(var_dump($pdo->errorInfo()));
     }

     $statement->bindParam(':reply_created', $createdAt, PDO::PARAM_STR);
     $statement->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
     $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
     $statement->bindParam(':reply', $reply, PDO::PARAM_STR);
     $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
     $statement->bindParam(':username', $username, PDO::PARAM_STR);

     $statement->execute();
     redirect("../../front/comments/gui-cmnt-section.php?post_id=$postId");
 }