<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Sanitization station.
// Trim, filter var. Sanitize string, email and hash password + password default.





$email = $_POST['email'];
$username = $_POST['username'];
$passphrase = $_POST['passphrase'];

$sql = "INSERT INTO users (email, username, passphrase) VALUES (:email, :username, :passphrase)";
$statement = $pdo->prepare($sql);

$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->bindParam(':username', $username, PDO::PARAM_STR);
$statement->bindParam(':passphrase', $passphrase);

$statement->execute();

$user = $statement->fetchAll(PDO::FETCH_ASSOC);


redirect('/');
