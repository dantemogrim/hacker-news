<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Add Post</h1>

    <form action="app/posts/add.php" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title" required>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="article">Article:</label>
            <textarea class="form-control" type="text" name="article" id="article" rows="5" placeholder="Type your content here." required></textarea>
        </div><!-- /form-group -->


        <div class="form-group">
            <label for="link">Link:</label>
            <input class="form-control" type="url" name="link" id="link" value="http://" required>
            <small class="form-text text-muted">Your source of information here.</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>