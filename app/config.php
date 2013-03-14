<?php
@ini_set('display_errors', 1);
@ini_set('max_execution_time', '0');
@ini_set('upload_max_filesize', '100M');
//@ini_set('default_charset', 'utf-8');
//phpinfo(32);

// URL
define('_BASE_URI_', '/');
define('_BASE_URL_', 'http://'.$_SERVER['SERVER_NAME'].'/');
define('_CSS_DIR_', _BASE_URL_.'css/');
define('_JS_DIR_', _BASE_URL_.'js/');
define('_IMG_DIR_', _BASE_URL_.'img/');

// Directories
define('_BASE_DIR_', realpath(dirname(__FILE__).'/..'));
define('_CLASS_DIR_', _BASE_DIR_.'/app/classes/');
define('_CONTROLLER_DIR_', _BASE_DIR_.'/app/controllers/');
define('_MODEL_DIR_', _BASE_DIR_.'/app/models/');
define('_VIEW_DIR_', _BASE_DIR_.'/app/views/');
define('_MAIL_DIR_', _BASE_DIR_.'/mails/');
define('_LIB_DIR_', _BASE_DIR_.'/lib/');
define('_MODULE_DIR_', _BASE_DIR_.'/module/');

// Database
define('_DB_NAME_', 'pul.parcer');
define('_DB_SERVER_', 'localhost');
define('_DB_USER_', 'root');
define('_DB_PASSWD_', '');
define('_DB_TYPE_', 'MySQL');

//Other
define('_FRIENDLY_URL_', 0);
