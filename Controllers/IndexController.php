<?php
/**
 * Index Controller
 * 
 * @package		InkDrop
 * @author		ScarWu
 * @copyright	Copyright (c) 2013, ScarWu (http://scar.simcz.tw/)
 * @license		https://github.com/scarwu/InkDrop/blob/master/LICENSE
 * @link		https://github.com/scarwu/InkDrop
 */

class IndexController extends \CLx\Core\Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function read() {
		// if(file_exists(CLX_APP_ROOT . 'InkDrop.sqlite3'))
		// 	\CLx\Core\Loader::view('Installation');
		// else
			\CLx\Core\Loader::view('Administrator');
	}
}
