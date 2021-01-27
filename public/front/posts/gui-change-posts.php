<?php

require __DIR__ . '/../../header.php';

if (!isset($_SESSION['loggedIn'], $_POST['post_id'], $_POST['user_id'])) {
    redirect('/public/front/users/gui-ls-login.php');
}

$postId = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);
$userId = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);

?>

<article>
    <h1>Edit Your Post</h1>


    <small>For security reasons you will only be able to change the description.</small>
    <br>

    <form action="/public/back/posts/change-post.php" method="post">
        <div class="form-group">
            <input type="hidden" name="post_id" id="post_id" value="<?= $postId; ?>">
            <input type="hidden" name="user_id" id="user_id" value="<?= $userId; ?>">
            <label for="article">Article description update:</label>
            <textarea class="form-control" type="text" name="post-update" id="post-update" rows="3" maxlength="300" required></textarea>
            <small>(Maximum length is 300 characters long.)</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</article>
