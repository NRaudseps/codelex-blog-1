<h1>Articles</h1>

<?php foreach ($articles as $article): ?>
    <h3>
        <a href="/articles/<?php echo $article->id(); ?>">
            <?php echo $article->title(); ?>
        </a>
    </h3>
    <p><?php echo $article->content(); ?></p>
    <p>
        <small>
            <?php echo $article->createdAt(); ?>
        </small>
    </p>
    <p>Total Likes: <?= $article->likes();?></p>
    <form action="/articles/<?php echo $article->id();?>/like" method="post">
        <button type="submit" name="like" value="1">Like</button>
        <button type="submit" name="like" value="-1">Dislike</button>
    </form>
<?php endforeach; ?>
