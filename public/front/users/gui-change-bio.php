<?php require __DIR__ . '/../../header.php'; ?>

<?php
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif; ?>

<article>
    <h1>Edit Bio</h1>

    <form action="/public/back/users/change-bio.php" method="post">
        <div class="form-group">
            <label for="article">Type in your new bio here:</label>
            <textarea class="form-control" type="text" name="bio" id="bio" rows="3" placeholder="" maxlength="300" required></textarea>
            <small>(max 300 characters long)</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</article>
