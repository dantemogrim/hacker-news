<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';
// In this file we store/insert new posts in the database.

// Check if the user is logged in - otherwise redirect.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/login.php');
endif;

// Check if forms are set and sanitize.
if (isset($_POST['title'], $_POST['article'], $_POST['link'])) :

    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $article = trim(filter_var($_POST['article'], FILTER_SANITIZE_STRING));
    $link = trim(filter_var($_POST['link'], FILTER_SANITIZE_STRING));


    if (empty($title) || empty($article) || empty($link)) {
        echo 'Fill in all the fields, please.';

        exit();
        // redirect('/gui-register.php');
    }

    $userId = $_SESSION['loggedIn']['userId'];
    $createdAt = date("Ymd");

    // Insert into SQLite database.
    $statement = $pdo->prepare('INSERT INTO posts (title, content, link, created_at, user_id) 
    VALUES (:title, :content, :link, :created_at, :user_id)');

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':content', $article, PDO::PARAM_STR);
    $statement->bindParam(':link', $link, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $userId, PDO::PARAM_STR);
    $statement->bindParam(':created_at', $createdAt, PDO::PARAM_STR);
    $statement->execute();

endif;


redirect('/');
