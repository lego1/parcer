<?php 
if (isset($modules['left']) && count($modules['left']) > 0)
	foreach ($modules['left'] as $module)
		echo $module; 
?>