<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';



// If it has not been set

// Check if all forms are properly filled in.
if (isset($_POST['name'], $_POST['username'] $_POST['email'], $_POST['password'])) {
    exit('Something seems to be missing. Please, fill all fields.');
}

$name = $_POST['name'];
$username = $_POST['email'];
$email = $_POST['email'];
$password = $_POST['password'];








/* Dummy Data User:

Sir Waffle Kale of Coop
coolPerson_123
cool_as_ice@hotmail.com
SillyPassword123

*/

//if ($statement = $pdo->(prepare('INSERT INTO users')))




// Collect and sanitize email, sanitize strings, hash password.
// Define their names and give them their proper functions.
//$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
//$password = $_POST['password'];



// The password_hash function creates a new password hash
// CODE $hash = password_hash($passphrase, PASSWORD_DEFAULT);

// Check if both email and password exists in the POST request.

// Prepare, bind email parameter and execute the database query.

//$registerQuery = "INSERT INTO users (email, ) VALUES (:user)";

//$statement = $pdo->prepare('INSERT INTO users WHERE email = :email');
// Defining what :email variable actually is. Hardcode to string.
//$statement->bindParam(':email', $email, PDO::PARAM_STR);
//$statement->bindParam(':password', $password, PDO::PARAM_STR);
//$statement->execute();

// Fetch the user as an associative array.
//$user = $statement->fetch(PDO::FETCH_ASSOC);
//die(var_dump($user));
// If we couldn't find the user in the database, redirect back to the login
// page with our custom redirect function.
//if (!$user) {
//redirect('/login_form.php');
//}

// If we found the user in the database, compare the given password from the
//if (password_verify($_POST['password'], $user['password'])) {
// If the password was valid we know that the user exists and provided
// the correct password. We can now save the user in our session.
// Remember to not save the password in the session!
//unset($user['password']);

//$_SESSION['user'] = $user;
//}
//}



// We should put this redirect in the end of this file since we always want to
// redirect the user back from this file.
redirect('/');
