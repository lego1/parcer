<?php
class Controller {
    public $model;
    public $view;
	public $db;
	public $data = array();
	public $js = array();
	public $css = array();
	public $modules = array();
	
    function __construct($type = 'app'){
		$mname = 'Model'.ucfirst(strtolower(Tools::pageName()));
		(file_exists('app/models/'.$mname.'.php')) ? $this->model = new $mname() : '';
        $this->view = new View();
		$this->db = new DB();
		
		if ($type == 'app') {
			### begin TO DO: css-стили, js модулей и сами модули, подключенный к конкретной странице. Берется из админки.
			array_push($this->css, 'menucategories');
			array_push($this->js, 'menucategories');
			$this->modules['header'] = 'menucategories';
			### end TO DO

			$this->data['js'] = $this->loadJS($this->js);
			$this->data['css'] = $this->loadCSS($this->css);
			$this->data['modules'] = $this->loadModules($this->modules);
		}
    }
	
	function index(){
	
    }
	
	function loadСontroller($name, $type = 'app') {
		$name = ucfirst(strtolower($name));
		$controller = 'Controller'.$name;
		$path = ($type == 'app') ? $type.'/models/'.$controller.'.php' : $type.'/'.strtolower($name).'/'.$controller.'.php';
		if (file_exists($path)) {
			if (require_once($path)) {
				($type == 'app') ? $c = new $controller : $c = new $controller('module');
				if (method_exists($controller, 'index'))
					return $c->index();
				else 
					return Tools::displayError('Метод inedx не найден у контроллера : '.$controller);
			}
			else {
				return Tools::displayError('Неудалось подключить модуль: "'.$type.'/'.strtolower($name).'/'.$controller.'.php"');
			}
		}
		else {
			return Tools::displayError('Неудалось запустить контроллер '.$controller.'.');
		}
	}
	function loadModel($name, $type = 'app') {
		$name = ucfirst(strtolower($name));
		$model = 'Model'.$name;
		$path = ($type == 'app') ? $type.'/models/'.$model.'.php' : $type.'/'.strtolower($name).'/'.$model.'.php';
		if (file_exists($path)) {
			if (require_once($path))
				return $temp = new $model();
			else 
				return Tools::displayError('Неудалось подключить модель по заданному пути: "'.$type.'/models/'.$model.'.php"');
		}
		else {
			return Tools::displayError('Модели '.$model.' не существует.');
		}
	}
	
	function loadJS($files){
		global $js;
		if (count($files) > 0)
			foreach ($files as $file)
				if (file_exists('js/'.strtolower($file).'.js'))
					$js[] = _BASE_URL_.'js/'.strtolower($file).'.js';
				elseif (file_exists(_MODULE_DIR_.strtolower($file).'/'.ucfirst(strtolower($file)).'.js'))
					$js[] =_BASE_URL_.'module/'.strtolower($file).'/'.ucfirst(strtolower($file)).'.js';
		return $js;
    }
	function loadCSS($files){
		global $css;
		if (count($files) > 0)
			foreach ($files as $file)
				if (file_exists('css/'.strtolower($file).'.css'))
					$css[] = _BASE_URL_.'css/'.strtolower($file).'.css';
				elseif (file_exists(_MODULE_DIR_.strtolower($file).'/'.ucfirst(strtolower($file)).'.css'))
					$css[] = _BASE_URL_.'module/'.strtolower($file).'/'.ucfirst(strtolower($file)).'.css';
		return $css;
    }
	function loadModules($files){
		ksort($files);
		if (count($files) > 0)
			foreach ($files as $k => $module)
				$modules[$k][$module] = $this->loadСontroller($module, 'module');
		return $modules;
    }
}