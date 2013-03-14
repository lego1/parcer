<?php if (isset($objects) && count($objects) > 0) : ?>
<table class="objects">
	<thead>
		<tr>
			<td>Категория</td>
			<td>Район</td>
			<td>Цена</td>
			<td>Описание</td>
			<td>E-mail</td>
			<td>Телефон</td>
			<td>&nbsp;</td>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($objects as $k=>$object) {
			echo '<tr class="'.((($k+1)%2 == 0) ? 'two' : 'one').'">';
			echo '<td>'.$object['category_name'].'</td>';
			echo '<td>'.$object['district'].'</td>';
			echo '<td>'.$object['price'].'</td>';
			echo '<td>'.$object['title'].'</td>';
			echo '<td>'.$object['email'].'</td>';
			echo '<td>'.$object['phone'].'</td>';
			echo '<td><a class="add_to_blacklist" href="'.Tools::getLink('blacklist','add',$object['phone']).'">В черный список</td>';
			echo '</tr>';
		}
		?>
	</tbody>
</table>
<?php endif; ?>