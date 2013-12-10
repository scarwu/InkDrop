<?php
/**
 * Ajax Controller
 * 
 * @package		InkDrop
 * @author		ScarWu
 * @copyright	Copyright (c) 2013, ScarWu (http://scar.simcz.tw/)
 * @license		https://github.com/scarwu/InkDrop/blob/master/LICENSE
 * @link		https://github.com/scarwu/InkDrop
 */

class AjaxController extends \CLx\Core\Controller {

	public function __construct() {
		parent::__construct();
		
		// Load Config
		$this->database_config = \CLx\Core\Loader::config('Database', CLX_MODE);

		// Load Library
		\CLx\Core\Loader::library('StatusCode');
		
		// Load Model
		$this->auth_model = \CLx\Core\Loader::model('Auth');
	}
	
	/**
	 * Parse Path
	 * 
	 * @param	string $segments
	 * @return	string $path
	 */
	private function _parsePath($segments = NULL) {
		$blacklist = array('\\', '/', ':', '*', '?', '"', '<', '>', '|');
		$path = '/';
		foreach((array)$segments as $value)
			if($value != '.' || $value != '..') {
				$value = str_replace($blacklist, '', $value);
				$path .= $path == '/' ? $value : '/' . $value;
			}
		return $path;
	}

	public function read($segments) {
		$headers = \CLx\Core\Request::headers();
		$params = \CLx\Core\Request::params();
		
		if($username = $this->auth_model->updateToken($token)) {
			// Database Disconnect
			\CLx\Library\Database::disconnect();
			
		}
		
		if(StatusCode::isError()) 
			\CLx\Core\Response::setCode(404);
	}
	
	public function create($segments) {
		$headers = \CLx\Core\Request::headers();

		if($username = $this->auth_model->updateToken($token)) {
			// Database Disconnect
			\CLx\Library\Database::disconnect();
	
		}
		
		if(StatusCode::isError())
			\CLx\Core\Response::setCode(404);
	}
	
	public function update($segments) {
		$headers = \CLx\Core\Request::headers();
		
		if($username = $this->auth_model->updateToken($token)) {
			
		}
		
		if(StatusCode::isError())
			\CLx\Core\Response::setCode(404);
	}
	
	public function delete($segments) {
		$headers = \CLx\Core\Request::headers();

		if($username = $this->auth_model->updateToken($token)) {
		
		}
		
		if(StatusCode::isError())
			\CLx\Core\Response::setCode(404);
	}
}
