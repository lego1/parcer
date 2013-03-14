<?php 
if (isset($modules['header']) && count($modules['header']) > 0)
	foreach ($modules['header'] as $module)
		echo $module; 
?>

<div class="tab tab-parcing">
	<ul>
		<li><a href="<?php echo Tools::getLink('parcing','index','0'); ?>" rel="loading">Сегодня</a></li>
		<li><a href="<?php echo Tools::getLink('parcing','index','1'); ?>" rel="loading">Вчера</a></li>
		<li><a href="<?php echo Tools::getLink('parcing','index','2'); ?>" rel="loading">2 дня назад</a></li>
		<li><a href="<?php echo Tools::getLink('parcing','index','3'); ?>" rel="loading">3 дня назад</a></li>
		<li><a href="<?php echo Tools::getLink('parcing','index','4'); ?>" rel="loading">4 дня назад</a></li>
		<li><a href="<?php echo Tools::getLink('parcing','index','5'); ?>" rel="loading">5 дней назад</a></li>
		<li><a href="<?php echo Tools::getLink('parcing','index','6'); ?>" rel="loading">6 дней назад</a></li>
		<li><a href="<?php echo Tools::getLink('parcing','index','7'); ?>" rel="loading">7 дней назад</a></li>
	</ul>
</div>

<div class="tab tab-blacklist">
	<ul>
		<li><a href="<?php echo Tools::getLink('blacklist'); ?>">Черный список</a></li>
	</ul>
</div>