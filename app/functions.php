<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}





// Is the user already logged in? If not - redirect them to the login page.
function loggedIn()
{
    if (!isset($_SESSION['user'])) {
        redirect('/login,php');
    }
}




// ======================================================
//                  CATEGORY LARGE FONT
// ======================================================


// ------------------------------------------------------
//                  Sub-category of some kind.
// ------------------------------------------------------

/* Detailed explanation of something.
* That should require.
* Several paragraphs.
* Yeah.
*/






/* 
*
*
*
*/