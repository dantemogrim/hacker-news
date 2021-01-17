<?php require __DIR__ . '/../header.php';

if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/views/gui-login.php');
endif;


// Fetching all comments from database.
$comments = $pdo->prepare('SELECT * FROM comments ORDER BY comment_created DESC');
$comments->execute();
$allComments = $comments->fetchAll(PDO::FETCH_ASSOC);

// print_r($allPosts);
?>
<!-- Need to bring in the ACTUAL article here and connect through sql.
 Why isn't user or date showing? Something weird with the foreach.
 Don't forget to put this in the backend! -->

<h1>(ARTICLE)</h1>
<br>
<article>


    <form action="../app/comments/add.php" method="post">
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
    $singleCommentAuthor = $commentAuthor->fetch(PDO::FETCH_ASSOC);

    ?>


    <div class="card">
        <h5 class="card-header">by: <?= $singleCommentAuthor['username']; ?></h5>
        <div class="card-body">
            <p class="card-text"><?= $singleComment['text']; ?></p>
        </div>
    </div>

    <br>

<?php endforeach; ?>
