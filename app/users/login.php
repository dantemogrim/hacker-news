<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php'; // Connect to database.

// Check if both email and password exists in the post request.
if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Prepare, bind email parameter and execute the database query.
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    // Fetch the user as an associative array.
    $user = $statement->fetch(PDO::FETCH_ASSOC);


    if (
        isset($user['password']) &&
        password_verify($password, $user['password'])
    ) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
        ];

        redirect('/');
    }
}

//die(var_dump('Can you see me?'));

//redirect 


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
   // }
// }

// We should put this redirect in the end of this file since we always want to
// redirect the user back from this file.
// redirect('/');
