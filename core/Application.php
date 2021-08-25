<?php

namespace app\core;

/**
 * Application class
 */

class Application
{
	
	public static $ROOT_PATH;

	function __construct($rootPath)
	{
		self::$ROOT_PATH = $rootPath;	
	}
}

?>