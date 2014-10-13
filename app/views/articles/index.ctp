<h1>Liste des articles</h1>
<hr>
<?php foreach($articles as $article) { ?>
<div class="article">
	<h2><?php echo $this->Html->link($article['Article']['name'], $article['Article']['url']); ?></h2>
	<div class="author"><?php echo $article['User']['username']; ?></div>
	<p><?php echo $article['Article']['content']; ?></p>
</div>
<?php } ?>