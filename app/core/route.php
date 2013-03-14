<?php
class Route {
    static function start() {
		/*
        $routes = explode('/', $_SERVER['REQUEST_URI']);
		$controller_name = (!empty($routes[1])) ? $routes[1] : 'Main';
		$action_name = (!empty($routes[2])) ? $routes[2] : 'index';
		$value = (!empty($routes[3])) ? $routes[3] : '';
		*/
		$controller_name = ucfirst(strtolower((Tools::getValue('route')) ? Tools::getValue('route') : 'Main'));
        $action_name = (Tools::getValue('action')) ? Tools::getValue('action') : 'index';
		$value = (Tools::getValue('value')) ? Tools::getValue('value') : '';
	
		$model_name = 'Model'.$controller_name;
        $model_file = $model_name.'.php';
        $model_path = "app/models/".$model_file;
        if (file_exists($model_path)) 
			include 'app/models/'.$model_file;

        $controller_name = 'Controller'.$controller_name;
        $controller_file = $controller_name.'.php';
        $controller_path = "app/controllers/".$controller_file;
        if (file_exists($controller_path)) 
			include "app/controllers/".$controller_file;
        else 
			Tools::ErrorPage404();
        
        $controller = new $controller_name;
        if (method_exists($controller, $action_name))
			$controller->$action_name();
        else 
			Tools::ErrorPage404();
    }	
}