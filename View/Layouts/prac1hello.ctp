<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title><?php echo $title_for_layout;?></title>
<?php
echo $this->Html->css('cake.prac1hello');
echo $scripts_for_layout;
?>
</head>
<body>
<div id='container'>
	<div id='header'>** Header **</div>
	<div id='content'>
		<?php echo $content_for_layout;?>
	</div>
	<div id='footer'>** this is test.**</div>
</div>
</body>
</html>

