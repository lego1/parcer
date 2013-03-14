<?php 
if (isset($modules['right']) && count($modules['right']) > 0)
	foreach ($modules['right'] as $module)
		echo $module; 
?>