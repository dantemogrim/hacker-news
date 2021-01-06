<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}


// ----------------- * REGISTER USER * ------------------ 
// Asses that the data doesn't already exist. 

// This built-in function will generate a powerful hash
// $hash = password_hash($passphrase, PASSWORD_DEFAULT);






// ----------------- * LOGIN USER * ------------------ 
// Asses if user and password matches?

// password_verify($passphrase, $hash);



// ----------------- * LOGIN USER * ------------------ 