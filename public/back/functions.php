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
        redirect('/public/front/users/gui-ls-login.php');
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
    // Make them order by date.
    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
    $reversedComments = array_reverse($comments);

    if (!$reversedComments) {
        return [];
    }

    return $reversedComments;
}

function fetchSmileAmount(string $postId, PDO $pdo): string
{
    $statement = $pdo->prepare('SELECT COUNT(post_id) AS likes FROM smiles WHERE post_id = :post_id');
    $statement->bindParam(":post_id", $postId, PDO::PARAM_INT);
    $statement->execute();

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $smiles = $statement->fetch(PDO::FETCH_ASSOC);

    return $smiles['likes'];
}

function fetchAllSmiles(PDO $pdo): array
{
    $allPosts = fetchAllPosts($pdo);
    $allPostsWithSmiles = [];

    foreach ($allPosts as $post) {
        $numberOfSmiles = fetchSmileAmount($post['id'], $pdo);
        $post['smiles'] = $numberOfSmiles;
        $allPostsWithSmiles[] = $post;
    }

    usort($allPostsWithSmiles, function ($postTwo, $postOne) {
        if ($postOne['smiles'] > $postTwo['smiles']) {
            return 1;
        } else if ($postOne['smiles'] < $postTwo['smiles']) {
            return -1;
        } else if ($postOne['smiles'] === $postTwo['smiles']) {
            return 0;
        }
    });

    return $allPostsWithSmiles;
}

// Fetch comment for replies
function fetchComment(int $commentId, PDO $pdo): array
{
    $statement = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
    $statement->bindParam(":id", $commentId, PDO::PARAM_INT);
    $statement->execute();

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
}

// Fetch replies to comments
function fetchReplies(int $commentId, PDO $pdo): array
{
    $statement = $pdo->prepare('SELECT * FROM replies WHERE comment_id = :comment_id');
    $statement->bindParam(":comment_id", $commentId, PDO::PARAM_INT);
    $statement->execute();

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $replies = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $replies;
}
