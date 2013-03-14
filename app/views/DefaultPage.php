<!DOCTYPE html>
<html lang="ru">
<head>
    <meta content="application/xhtml+xml; charset=utf-8" http-equiv="Content-Type">
    <title>Главная</title>
	<link rel="stylesheet" href="<?php echo _CSS_DIR_ ?>reset.css" />
	<?php if (isset($css) && count($css) > 0) foreach ($css as $c) echo '<link rel="stylesheet" href="'.$c.'" />';	?>
	<link rel="stylesheet" href="<?php echo _CSS_DIR_ ?>template.css" />
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<?php if (isset($js) && count($js) > 0) foreach ($js as $j) echo '<script src="'.$j.'"></script>'; ?>
	<script src="<?php echo _JS_DIR_ ?>template.js"></script>
</head>
<body>
	<header>
		<?php include 'app/views/DefaultHeader.php'; ?>
	</header>
	<section>
		<aside><?php include 'app/views/DefaultLeft.php'; ?></aside>
		<article><?php include 'app/views/DefaultPart.php'; ?></article>
		<aside><?php include 'app/views/DefaultRight.php'; ?></aside>
  </section>
	<footer>
		<?php include 'app/views/DefaultFooter.php'; ?>
	</footer>
</body>
</html>