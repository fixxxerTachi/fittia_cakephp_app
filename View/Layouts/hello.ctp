<!doctype html>
<html>
<head>
<?php echo $this->Html->charset() ?>
<title><?php echo $title_for_layout ?></title>
<?php 
	echo $this->Html->css('cake.hello');
	echo $scripts_for_layout;
?>
</head>
<body>
<div id='container'>
	<div id='header'>** Hedder ** </div>
	<div id='content'>
		<?php echo $content_for_layout;?>
	</div>
	<div id='footer'> ** this is test. ** </div>
</div>
</body>
</html>

