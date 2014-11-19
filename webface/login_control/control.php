<?php
	session_start();
	require_once 'user.php';
	require_once 'authenticator.php'; 
	require_once 'session.php';

	$action = $_REQUEST['name_action'];

	if($action == 'login') {
		# Use the singleton to instantiate 
		# Only one authentication object 
		# And hide the actual class Authentication 
 
		$auth = Authenticator::instantiate();
 
		# erforms the authentication process
		if ($auth->login($_REQUEST['login'], $_REQUEST['passwd'])) {
			# redirects the user into the system
		        header('Location: ../index.php');
		}else {
			# Send the user back to 
			# The login form
		        header('Location: ../login.php');
		} 
	}elseif($action == 'logout'){
		# Sends the user out of the system 
		# The login form
		header ('Location: ../login.php');

 	}
?>
