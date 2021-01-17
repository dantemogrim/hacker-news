<?php require __DIR__ . '/../header.php'; ?>

<h1>(ARTICLE)</h1>
<br>
<article>


    <form action="../app/posts/comments.php" method="post">
        <div class="form-group">
            <label for="comment">
                <h3>Comment this post:</h3>
            </label>
            <textarea class="form-control" type="text" name="comment" id="comment" rows="3" placeholder="Your text here." required></textarea>
            <small>(max x characters long)</small>
        </div><!-- /form-group -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</article>
<br>
<h3>Other people have written:</h3>
