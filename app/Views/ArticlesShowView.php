<a href="/">Back</a>
<h1><?php echo $article->title(); ?></h1>
<p><?php echo $article->content(); ?></p>
<p>
    <small>
        <b><?php echo $article->createdAt(); ?></b>
    </small>
</p>

<div style="height: 30px;"></div>

<h2>Comment Section</h2>

<ul>
    <?php foreach ($comments as $comment): ?>
        <li><?php echo $comment->name() . ': ' . $comment->content();?></li>
    <?php endforeach; ?>
</ul>

<div style="height: 30px;"></div>

<h3>Tags</h3>
<?php foreach ($tags as $tag) : ?>
    <?php echo $tag->name()?>
<?php endforeach; ?>

<h3>Submit a New Comment</h3>
<form action="/" method="post">
    <label style="display: block">Enter Your Name</label>
    <textarea name="name" id="name" cols="10" rows="1"></textarea>
    <label style="display: block">Enter Your Comment</label>
    <textarea name="content" id="content" cols="30" rows="5"></textarea>
    <div style="display: block"></div>
    <button type="submit" name="submit">Submit</button>
</form>