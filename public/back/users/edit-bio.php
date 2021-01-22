<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['bio'])) {
    $bio = trim(filter_var($_POST['bio'], FILTER_SANITIZE_STRING));
    $id = $_SESSION['loggedIn']['userId'];

    $statement = $pdo->prepare("UPDATE users SET bio = :bio WHERE id = :id");
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    $_SESSION['loggedIn'] = [
        'username' => $user['username'],
        'avatar' => $user['avatar'],
        'email' => $user['email'],
        'bio' => $user['bio'],
        'userId' => $user['id']
    ];
}


redirect('/public/front/users/gui-profile.php');
