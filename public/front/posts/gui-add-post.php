<?php require __DIR__ . '/../../header.php'; ?>

<article>
    <h1>Add Post</h1>


    <form action="/public/back/posts/add-post.php" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title" required>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="article">Article description:</label>
            <textarea class="form-control" type="text" name="article" id="article" rows="3" placeholder="Type your content here." required></textarea>
            <small>(max x characters long)</small>
        </div><!-- /form-group -->


        <div class="form-group">
            <label for="link">Link:</label>
            <input class="form-control" type="url" name="link" id="link" value="http://" required>
            <small class="form-text text-muted">Your source of information here.</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</article>
