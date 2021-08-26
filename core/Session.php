<?php
namespace app\core;

class Session
{
	protected const FLASH_MESSAGES = 'flash_messages';
	protected const AUTH_SESSION = 'auth_session';

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


	public function setAuthSession($key, $value)
	{
		$_SESSION[self::AUTH_SESSION][$key] = $value;
	}
	public function getAuthSession(string $key)
	{	
		return $_SESSION[self::AUTH_SESSION][$key];
	}

	public function destroyAuthSession()
	{
		unset($_SESSION[self::AUTH_SESSION]['user_id']);
	}

	public function isAuthenticated()
	{
		return $_SESSION[self::AUTH_SESSION]['user_id'] ?? false;
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