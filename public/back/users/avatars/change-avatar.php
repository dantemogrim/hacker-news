<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $profilePictureName =  date('ymd') . '-' . ($avatar['name']);
    $uploadedDir = __DIR__ . '/store/';
    $destination = $uploadedDir . $profilePictureName;
    $id = $_SESSION['loggedIn']['id'];
    move_uploaded_file($avatar['tmp_name'], $destination);

    $sql = "UPDATE users SET avatar = :avatar WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':avatar', $profilePictureName, PDO::PARAM_STR);
    $statement->execute();

    $sql = "SELECT * FROM users WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    $_SESSION['loggedIn'] = [
        'username' => $user['username'],
        'avatar' => $user['avatar'],
        'email' => $user['email'],
        'bio' => $user['bio'],
        'id' => $user['id']
    ];
}

redirect('/public/front/users/gui-profile.php');
