<!DOCTYPE html>
<meta charset="utf-8"> 
<html>
<head>
<title><?php echo $title_for_layout ?></title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div id="header">
<?php echo $this->element('navbar'); ?>
</div>
<div id="container" class="container">
	<?php echo $content_for_layout ?>
	<div class="well">
		<?php echo $this->element('sql_dump'); ?>
	</div>
</div>
<div id="footer"></div>
</body>

<?php echo $scripts_for_layout ?>
<?php echo $this->Html->script('//code.jquery.com/jquery-1.11.1.min.js'); ?>
<?php echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'); ?>
<?php echo $this->Html->script('app.js'); ?>
</html>