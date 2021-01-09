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

    // If we couldn't find the user in the database, redirect back to the login
    // page with our custom redirect function.
    // Should be able to throw $_SESSION error messages to users here.
    //if (!$user) {
        //redirect('/login_form.php');
    //}

    // If we found the user in the database, compare the given password from the
    // request with the one in the database using the password_verify function.
    //if (password_verify($_POST['password'], $user['password'])) {
        // If the password was valid we know that the user exists and provided
        // the correct password. We can now save the user in our session.
        // Remember to not save the password in the session!
      //  unset($user['password']);

       // $_SESSION['user'] = $user;



       /* If the password and username don't match the ones in the database
* during login - throw an error.
*/