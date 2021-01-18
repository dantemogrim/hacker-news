<?php require __DIR__ . '/../../header.php'; ?>


<?php



if (isset($_FILES['avatar'])) {
    $errors = [];
    //$id = $_SESSION['loggedIn']['id'];
    $avatar = $_FILES['avatar'];
    $newProfilePic = $avatar['name'];
    $avatarLength = count($avatar['name']);
    //$avatarFolder = __DIR__ . '/public/back/users/avatars' . $newProfilePic;

    //($avatar['size'] > 2097152) {
    //$_SESSION['msg'] = "The uploaded file exceeded the filesize limit.";
    //redirect('/public/front/users/gui-profile.php');
    //} else

    for ($i = 0; $i < $avatarLength; $i++) {
        if ($avatar['type'][$i] !== 'image/gif') {
            $errors[] = 'The ' . $avatar['name'][$i] . ' image file type is not allowed.';
        }

        if ($avatar['size'][$i] >= 3145728) {
            $errors[] = 'The uploaded file ' . $avatar['name'][$i] . ' exceeded the filesize limit.';
        }
    }

    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;

        redirect('/gui-profile');
        exit;
    }

    $statement = $pdo->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
    $statement->bindParam(':avatar', $newProfilePic, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    for ($i = 0; $i < $avatarLength; $i++) {
        $avatarFolder = __DIR__ . '/uploads/' . date('ymd') . '-' . $avatar['name'][$i];

        move_uploaded_file($avatar['tmp_name'][$i], $avatarFolder);
    }


    /*if //(isset($_FILES['avatar'])) {
  move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . '/avatar.png');
} */
    /*if //(isset($_FILES['avatar'])) {
  die(var_dump($_FILES['avatar']));
}*/
    // If the superglobal contains the file, save it to database as 'avatar.png'.
}

?>


<h2><i>Your profile</i></h2>
<h1><?php echo $_SESSION['loggedIn']['username']; ?> </h1>



<br>

<form action="gui-profile.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="avatar">Choose a PNG image to upload</label>
        <input type="file" name="avatar" id="avatar" accept=".png" required>
    </div>

    <button type="submit">Upload</button>
</form>

Bio:
<br>

Posts:
<ul>Edit Posts</ul>
<br>

Comments:
<ul>Edit Comments</ul>
<br>

<a href="/public/front/users/gui-acc-settings.php">
    Account Settings
</a>
