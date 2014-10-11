<!DOCTYPE html>
<meta charset="utf-8"> 
<html>
<head>
<title><?php echo $title_for_layout ?></title>
</head>
<body>
<div id="header">
<div id="menu" style="display: table; width: inherit; height: 50px; table-layout: fixed;">
	<div style="display: table-cell; width: 150px;"><?php echo $this->Html->link('Articles', array('controller' => 'articles', 'action' => 'index')); ?></div>
	<?php if(!isset($authentified)) { ?>
	<div style="display: table-cell; width: 150px;"><?php echo $this->Html->link('Se connecter', array('controller' => 'users', 'action' => 'login')); ?></div>
	<?php } else { ?>
		<div style="display: table-cell; width: 150px;"><?php echo $this->Html->link('Mon profil', array('controller' => 'users', 'action' => 'show')); ?></div>
		<div style="display: table-cell; width: 150px;"><?php echo $this->Html->link('Se déconnecter', array('controller' => 'users', 'action' => 'logout')); ?></div>
	<?php } ?>
</div>
</div>
<div id="container">
	<?php echo $content_for_layout ?>
	<?php echo $this->element('sql_dump'); ?>
</div>
<div id="footer"></div>
</body>
<?php echo $scripts_for_layout ?>
</html>