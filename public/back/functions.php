<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

// Check if user is logged in.
function loggedIn()
{
    if (!isset($_SESSION['loggedIn'])) {
        redirect('/login,php');
    }
}


//
//function userData(object $pdo, int $userId): array
//{
 //   $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
   // $statement->BindParam(':id', $userId, PDO::PARAM_INT);
   // $statement->execute();
   // $user =  $statement->fetch(PDO::FETCH_ASSOC);
   // return $user;
//}
