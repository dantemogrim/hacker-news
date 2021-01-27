<?php
require __DIR__ . '/../../header.php';

if (!isset($_SESSION['loggedIn'])) {
    redirect('/public/front/users/gui-ls-login.php');
}

$commentId = filter_var($_POST['comment_id'], FILTER_SANITIZE_NUMBER_INT);
$userId = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);

?>

<article>
    <h1>Edit Your Comment</h1>

    <form action="/public/back/comments/change-cmnt.php" method="post">
        <div class="form-group">
            <input type="hidden" name="comment_id" id="comment_id" value="<?= $commentId; ?>">
            <input type="hidden" name="user_id" id="user_id" value="<?= $userId; ?>">
            <label for="article">Comment update:</label>
            <textarea class="form-control" type="text" name="comment-update" id="comment-update" rows="3" maxlength="300" required></textarea>
            <small>(Maximum length is 300 characters long.)</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</article>
