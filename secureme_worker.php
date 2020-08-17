<?php 

// Database integration

include "database/badBotDatabase.php";
include "config.php";

// Bad bot detection

if ($badBotDetection)
{

	foreach ($badBots as $badBot)
	{
		if ($_SERVER['HTTP_USER_AGENT'] == $badBot)
			exit($badBotMsg);
	}

}


// SQL injection protection

if ($sqlInjectionProtection)
{

	if ($sqlInjectionRemove) 
	{
		
		foreach ($_POST as $post => $postValue)
		{
			$_POST[$post] = preg_replace("/[\-]{2,}|[;]|[']|[\\\*]/", null, $postValue);
		}

		foreach ($_GET as $get => $getValue)
		{
			$_GET[$get] = preg_replace("/[\-]{2,}|[;]|[']|[\\\*]/", null, $getValue);
		}

	}
	else
	{

		foreach ($_POST as $post => $postValue)
		{
			if (preg_match("/[\-]{2,}|[;]|[']|[\\\*]/", $postValue))
				exit($sqlInjectionMsg);
		}

		foreach ($_GET as $get => $getValue)
		{
			if (preg_match("/[\-]{2,}|[;]|[']|[\\\*]/", $getValue))
				exit($sqlInjectionMsg);
		}

	}

}


// XSS blocker

if ($xssFiltration)
{

	if ($xssFiltrationRemove) 
	{
		
		foreach ($_POST as $post => $postValue)
		{
			$_POST[$post] = strip_tags($postValue);
		}

		foreach ($_GET as $get => $getValue)
		{
			$_GET[$get] = strip_tags($getValue);
		}

	}
	else
	{

		foreach ($_POST as $post => $postValue)
		{
			if (preg_match("/(\b)(on\S+)(\s*)=|javascript|(<\s*)(\/*)script/", $postValue))
				exit($xssFiltrationMsg);
		}

		foreach ($_GET as $get => $getValue)
		{
			if (preg_match("/(\b)(on\S+)(\s*)=|javascript|(<\s*)(\/*)script/", $getValue))
				exit($xssFiltrationMsg);
		}
		
	}

}


// Clickjacking protection

if ($clickjackingProtection)
	header("X-Frame-Options: sameorigin");


// HSTS

if ($hstsStatus)
	header("Strict-Transport-Security: max-age=15552000; preload");


// PHP version hider

if ($phpVersionHide)
	header('X-Powered-By: PHP/hidden');


?>