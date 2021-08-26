<?php
namespace app\core;

class Session
{
	protected const FLASH_MESSAGES = 'flash_messages';

	public function __construct()
	{
		session_start();
		$flashMessages = $_SESSION[self::FLASH_MESSAGES] ?? [];
		foreach ($flashMessages  as &$flashMessage) {
			$flashMessage['removed'] = true;
		}
		$_SESSION[self::FLASH_MESSAGES] = $flashMessages;
	}
	public function setFlash($key, $message)
	{
		$_SESSION[self::FLASH_MESSAGES][$key] = [
			'removed' => false,
			'value' => $message,
		];
	}

	public function getFlash($key)
	{
		return $_SESSION[self::FLASH_MESSAGES][$key]['value'] ?? false;
	}

	public function __destruct()
	{
		$flashMessages = $_SESSION[self::FLASH_MESSAGES] ?? [];
		foreach ($flashMessages  as $key => &$flashMessage) {
			if($flashMessage['removed'] == true){
				unset($flashMessages[$key]);
			}
		}
		$_SESSION[self::FLASH_MESSAGES] = $flashMessages;
	}
}


?>