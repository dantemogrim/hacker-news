<?php require __DIR__ . '/../../header.php'; ?>

<h2><i>Your profile</i></h2>
<h1><?php echo $_SESSION['loggedIn']['username']; ?> </h1>

Avatar
<br>

<div class="mb-3">
    <label for="formFile" class="form-label">Default file input example</label>
    <input class="form-control" type="file" id="formFile">
</div>

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
