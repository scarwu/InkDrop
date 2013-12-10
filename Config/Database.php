<?php
/**
 * Database Config
 * 
 * @package		InkDrop
 * @author		ScarWu
 * @copyright	Copyright (c) 2013, ScarWu (http://scar.simcz.tw/)
 * @license		https://github.com/scarwu/InkDrop/blob/master/LICENSE
 * @link		https://github.com/scarwu/InkDrop
 */

/**
 * Database Config
 */
$Database['development'] = array(
	'type' => 'sqlite',
	'path' => CLX_APP_ROOT . 'InkDrop.sqlite3',
	'name' => 'ink_drop'
);
