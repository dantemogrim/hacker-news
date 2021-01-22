<?php require __DIR__ . '/../../header.php';

if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif;

?>

<h1>(ARTICLE)</h1>
<br>
<article>


    <form action="/public/back/comments/add-comment.php" method="post">
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

<?php foreach ($allComments as $singleComment) : ?>
    <?php $commentAuthor = $pdo->prepare('SELECT username FROM users WHERE id = :comment_author');
    $commentAuthor->bindParam(':comment_author', $singleComment['comment_author'], PDO::PARAM_STR);
    $commentAuthor->execute();
    $singleCommentAuthor = $commentAuthor->fetchAll(PDO::FETCH_ASSOC);

    ?>


    <div class="card">
        <h5 class="card-header">by: <?= $singleComment['comment_author'] ?></h5>
        <div class="card-body">
            <p class="card-text"><?= $singleComment['text']; ?></p>
        </div>
    </div>

    <br>

<?php endforeach; ?>
