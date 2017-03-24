<?php
require_once 'helpers.php';

Class BaseController {

	public function __construct()
  {
    session_start();
  }

	public function str_random($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function redirect($url)
	{
		if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
			$uri = 'https://';
		} else {
			$uri = 'http://';
		}
		$uri .= $_SERVER['HTTP_HOST'];

		session_regenerate_id(true);
		header('Location: '.$uri.'/php-mvc/views/pages/'.$url.'.php');
		session_write_close();
		exit();
	}

}
