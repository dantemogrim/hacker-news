<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['submit'])) {
    $userId = (int)$_SESSION['loggedIn']['id'];
    $sql = "SELECT passphrase FROM users WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $userId, PDO::PARAM_STR);
    $statement->execute();

    $statement = $pdo->prepare('DELETE FROM users WHERE id = :user_id');
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->execute();

    $statement = $pdo->prepare('DELETE FROM posts WHERE user_id = :user_id');
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->execute();

    $statement = $pdo->prepare('DELETE FROM comments WHERE user_id = :user_id');
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->execute();

    $statement = $pdo->prepare('DELETE FROM smiles WHERE smiling_user = :user_id');
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->execute();

    session_destroy();
}
redirect('/public/index.php');
