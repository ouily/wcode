<h1>Liste des articles</h1>
<hr>
<?php foreach($articles as $article) { ?>
<div class="article">
	<h2><?php echo $this->Html->link($article['Article']['name'], array('action' => 'show', $article['Article']['id'])) ?></h2>
	<p><?php echo $article['Article']['content']; ?></p>
</div>
<?php } ?>