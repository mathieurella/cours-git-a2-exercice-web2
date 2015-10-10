<?php session_start();
require('config/config.php');
require('model/functions.fn.php');

/********************************
			PROCESS
********************************/

if(isset($_POST['email']) && !empty($_POST['email']) && isset($Post['username']) &&!empty($_POST['username'])  && isset($Post['password']) &&!empty($_POST['password'])){

	/* isEmailAvailable
		return :
			true if available
			false if not available
		$db -> 				database object
		$email -> 			field value : email
	*/
	$email_ok = isEmailAvailable($db, "git@initiation.com");

	/* isUsernameAvailable
		return :
			true if available
			false if not available
		$db -> 				database object
		$username -> 			field value : username
	*/
	$username_ok = isUsernameAvailable($db, "Git");


	if ($email_ok && $username_ok) {
		/* userRegistration
			return :
				true for registration OK
				false for fail
			$db -> 				database object
			$username -> 		field value : username
			$email -> 			field value : email
			$password -> 		field value : password
		*/
		userRegistration($db, "Git", "git@initiation.com", "password");
		header('Location: login.php');
	}

	if (!$email_ok) {
		//
	}

	if (!$username_ok) {
		//
	}

}

/******************************** 
			VIEW 
********************************/

include 'view/_header.php';
include 'view/register.php';
include 'view/_footer.php';
