<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['bio'])) {
    $bio = filter_var($_POST['bio'], FILTER_SANITIZE_STRING);

    $sql = 'UPDATE users SET bio = :bio WHERE id = :id';

    $statement = $pdo->prepare($sql);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

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
