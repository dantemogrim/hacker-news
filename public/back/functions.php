<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

// Check if user is logged in.
function loggedIn()
{
    if (!isset($_SESSION['loggedIn'])) {
        redirect('/login,php');
    }
}

// Fetch updated user data.
function setSessionData(int $userId, PDO $pdo): void
{
    $statement = $pdo->prepare("SELECT id, avatar, bio, email, username FROM users WHERE id = :id");
    $statement->bindParam(":id", $userId, PDO::PARAM_INT);
    $statement->execute();

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $data = $statement->fetch(PDO::FETCH_ASSOC);

    $_SESSION['loggedIn'] = $data;
}

function fetchAllPosts(PDO $pdo): array
{
    $statement = $pdo->prepare('SELECT * FROM posts ORDER BY created_at DESC');
    $statement->execute();

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $allPosts = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $allPosts;
}


function fetchOnePost(int $postId, PDO $pdo): array
{
    $statement = $pdo->prepare('SELECT * FROM posts WHERE id = :post_id');
    $statement->bindParam(":post_id", $postId, PDO::PARAM_INT);
    $statement->execute();

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $onePost = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$onePost) {
        return [];
    }

    return $onePost;
}


function fetchAlias(int $userId, PDO $pdo): string
{
    $statement = $pdo->prepare('SELECT username FROM users WHERE id = :user_id');
    $statement->bindParam(":user_id", $userId, PDO::PARAM_INT);
    $statement->execute();

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $alias = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$alias) {
        return "not found";
    }

    return $alias['username'];
}


function fetchPostComments(int $postId, PDO $pdo): array
{
    $statement = $pdo->prepare('SELECT * FROM comments WHERE post_id = :post_id');
    $statement->bindParam(":post_id", $postId, PDO::PARAM_INT);
    $statement->execute();

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $comments = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$comments) {
        return [];
    }

    return $comments;
}
