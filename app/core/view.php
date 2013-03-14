<?php
class View {
    function generatePage($content, $template, $data = null, $status = true) {
		if (isset($data) && $data !== null)
			extract($data);
		include 'app/views/'.$template;
    }
	function generateModule($template, $data = null) {
		ob_start();
		if (isset($data) && $data !== null)
			extract($data);
		include _MODULE_DIR_.strtolower($template).'/'.ucfirst(strtolower($template)).'.php';
		$module = ob_get_contents();
		ob_end_clean();
		return $module;
    }
}