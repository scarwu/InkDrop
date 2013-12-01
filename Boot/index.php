<?php

/**
 * Define Default Path
 */
define('CLX_APP_ROOT', realpath($_SERVER['DOCUMENT_ROOT'] . '/..') . '/');
define('CLX_APP_CONFIG', CLX_APP_ROOT . 'Config/');
define('CLX_APP_VIEWS', CLX_APP_ROOT . 'Views/');

define('CLX_SYS_ROOT', '../CLx/');

/**
 * Reporting Setting
 */
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/**
 * Require CLx Config
 */
require_once CLX_SYS_ROOT . 'Config.php';

/**
 * Require CLx Autoload
 */
require_once CLX_SYS_ROOT . 'Core/Autoload.php';

// Register Autoload
\CLx\Core\Autoload::register();
 
/**
 * Require Route Config, Setting Router and Run
 */

// Init Router
$router = new \CLx\Core\Router($_SERVER['REQUEST_METHOD'], \CLx\Core\Request::uri());

// Add Route List
$router->addList(\CLx\Core\Loader::config('Route'));

// Run Router
$router->run();
