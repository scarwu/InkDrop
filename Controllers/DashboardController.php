<?php
/**
 * Dashboard Controller
 * 
 * @package		InkDrop
 * @author		ScarWu
 * @copyright	Copyright (c) 2013, ScarWu (http://scar.simcz.tw/)
 * @license		https://github.com/scarwu/InkDrop/blob/master/LICENSE
 * @link		https://github.com/scarwu/InkDrop
 */

class DashboardController extends \CLx\Core\Controller {

	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Load service list
	 */
	public function read() {
		\CLx\Core\Loader::view('Dashboard');
	}
}
