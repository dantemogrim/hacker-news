<?php require __DIR__ . '/../../header.php';

if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif; ?>


<h2><i>Hello</i></h2>
<h1><?php echo $_SESSION['loggedIn']['username']; ?> </h1>


<?php $path = '/public/back/users/avatars/store/'; ?>


<img src="<?= $path . $_SESSION['loggedIn']['avatar']; ?> ">



<br>

<form action="/public/back/users/avatars/edit-avatar.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="avatar">Choose a PNG image to upload</label>
        <br>
        <input type="file" name="avatar" id="avatar" accept=".png, .jpg" required>
    </div>

    <button type="submit">Upload</button>
</form>
<br>

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
