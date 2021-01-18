<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $folder = __DIR__ . '/store/' . date('ymd') . '-' . $avatar;
    $id = $_SESSION['loggedIn']['userId'];
    move_uploaded_file($avatar['tmp_name'], __DIR__ . $folder);

    $sql = "UPDATE users SET avatar = :avatar WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':avatar', $avatar, PDO::PARAM_STR);
    $statement->bindParam(':passphrase', $passphrase);
    $statement->execute();
}

redirect('/public/front/users/gui-profile.php');
