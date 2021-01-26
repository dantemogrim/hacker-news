<?php require __DIR__ . '/../../header.php'; ?>

<?php
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif; ?>

<article>
    <h1>Edit Your Post</h1>

    <form action="/public/back/posts/edit-post.php" method="post">
        <p>For security reasons - you won't be able to change the original title or link - only the description.</p>
        <p>Viewers will also be able to see if the original has been edited.</p>
        <p>This is to protect our users from data that might later be wrongfully manipulated.</p>

        <div class="form-group">
            <label for="article">Article description:</label>
            <textarea class="form-control" type="text" name="article" id="article" rows="3" placeholder="Type your content here." maxlength="300" required></textarea>
            <small>(Maximum length is 300 characters long.)</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</article>
