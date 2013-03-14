<?php 
if (isset($modules['main']) && count($modules['main']) > 0)
	foreach ($modules['main'] as $module)
		echo $module; 
?>
<?php include 'app/views/'.$content; ?>