<?php 
if (isset($modules['footer']) && count($modules['footer']) > 0)
	foreach ($modules['footer'] as $module)
		echo $module; 
?>