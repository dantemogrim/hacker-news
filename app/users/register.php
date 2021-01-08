<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Sanitization station.
// Trim, filter var. Sanitize string, email and hash password + password default.


// ----------------------------------------------------------------
$registeruser_msg = "";

// Checking that user got here in a proper way by pressing submit.
if (isset($_POST['register-submit'])) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $passphrase = password_hash($_POST['passphrase'], PASSWORD_DEFAULT);

    if (empty($email) || empty($username) || empty($passphrase)) {
        // Relocate user but let them keep their typed data in the  forms.
        //header("Location: gui-register.php?error=emptyfields&uid=" . $username . "$mail=" . $email);
        //header('Location: gui-register.php');
        exit();
    }
}



// ----------------------------------------------------------------


$sql = "INSERT INTO users (email, username, passphrase) VALUES (:email, :username, :passphrase)";
$statement = $pdo->prepare($sql);

$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->bindParam(':username', $username, PDO::PARAM_STR);
$statement->bindParam(':passphrase', $passphrase);

$statement->execute();

$user = $statement->fetchAll(PDO::FETCH_ASSOC);


redirect('/');
