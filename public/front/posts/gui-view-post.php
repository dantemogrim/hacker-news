<?php

require __DIR__ . '../../../header.php';


if (isset($_GET['post_id'])) {
    $postId = (int)filter_var($_GET['post_id'], FILTER_SANITIZE_NUMBER_INT);
    $post = fetchOnePost($postId, $pdo);
} else {
    // redirect user
}

?>

<div class="card">
    <h5 class="card-header">
        <a class="post-title-link" href="<?= $post['link']; ?>"><?= $post['title']; ?></a>
    </h5>
    <div class="card-body">
        <p class="card-text"><?= $post['description']; ?></p>
        <span class="badge bg-warning text-dark">By: <?= fetchAlias($post['user_id'], $pdo) ?> <?= $post['created_at']; ?></span>
        <span class="badge bg-success"><img class="smiley" src="/public/resources/media/icons/smiley.png"> (amount) smiles</span>
    </div>
</div>

<br>


<?php require __DIR__ . '/../../footer.php'; ?>
