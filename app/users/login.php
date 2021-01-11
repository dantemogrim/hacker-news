<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php'; // Connect to database.


// Check if e-mail & passphrase exist in the post request.
if (isset($_POST['email'], $_POST['passphrase'])) {
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $passphrase = $_POST['passphrase'];

  // Check if any of the login fields are empty.
  if (empty($email) || empty($passphrase)) {
    echo 'Fill out all of the fields.';
    exit();
    // redirect('/gui-login.php');
  }

  // Check if the actual email already exists within the database.
  $sql = "SELECT * FROM users WHERE email = :email";
  $statement = $pdo->prepare($sql);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->execute();
  $user = $statement->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
    echo 'There is no account registered to that e-mail.';
    // redirect('/gui-login.php');
    exit();
  }

  if (!password_verify($passphrase, $user['passphrase'])) {
    echo 'Wrong e-mail or password.';
    // redirect('/gui-login.php');
    exit();
  }
  // If all goes well, create a session for the user as logged in.
  if (isset($user['passphrase']) && password_verify($passphrase, $user['passphrase'])) {
    $_SESSION['loggedIn'] = [
      'username' => $user['username'],
      'email' => $user['email'],
      'userId' => $user['id']
    ];
  }

  redirect('/index.php');
};

// If things go south, take the user back to the login page.
redirect('/gui-login.php');
