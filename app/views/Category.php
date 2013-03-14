<?php
foreach ($categories as $category) 
	echo $category['id_category'].' - '.$category['name'].'('.$category['link'].')<br>';
?>

<a href="<?php echo Tools::getLink('category','save'); ?>">Импортировать категории</a>