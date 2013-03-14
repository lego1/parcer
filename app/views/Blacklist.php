<form id="blacklist" action="/" method="POST">
	<input type="hidden" name="route" value="blacklist">
	<input type="hidden" name="action" value="add">
	<input type="text" name="value" value="" required>
	<input type="submit" name="submit" value="Добавить в черный список" class="button">
</form>

<?php 
if (isset($phones) && count($phones) > 0) {
	echo '<ul class="blacklist">';
	foreach ($phones as $k=>$phone) {
		echo '<li>';
		echo '<p>'.$phone['phone'].'</p>';
		echo '<a class="remove_from_blacklist" href="'.Tools::getLink('blacklist','remove',$phone['phone']).'">Убрать из черного списка</a>';
		echo '</li>';
	}
	echo '<ul>';
} 
?>