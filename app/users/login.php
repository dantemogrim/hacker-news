<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php'; // Connect to database.

// Check if both email and password exists in the post request.
if (isset($_POST['email'], $_POST['passphrase'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $passphrase = password_hash($_POST['passphrase'], PASSWORD_DEFAULT);

    //if (
    //  isset($user['password']) &&
    //password_verify($password, $user['password'])
    //) {
    //$_SESSION['user'] = [
    //  'id' => $user['id'],
    //'name' => $user['name'],
    //'email' => $user['email'],
    // ];
}


$sql = "SELECT * FROM users WHERE email = :email";
// Prepare, bind email parameter and execute the database query.
$statement = $pdo->prepare($sql);
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->execute();

// Fetch the user as an associative array.
$user = $statement->fetch(PDO::FETCH_ASSOC);

/* If the password and username don't match the ones in the database
* during login - throw an error.
*/

// If everything goes well - take the user to the main page.
redirect('/index.php');

//die(var_dump('Can you see me?'));

//redirect 
// The password_verify function verifies that a password matches a hash.
// CODE password_verify($passphrase, $hash); // true

// if (password_verify($passphrase, $user['passphrase'])) {
  //  $_SESSION['loggedIN'] = 
//}