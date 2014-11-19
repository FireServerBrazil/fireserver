<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php';

	$user = null;
 
	$auth = Authenticator::instantiate(); 

	if ($auth->isLoggedIn()) {
		$user = $auth->getUser();
	}/*else{
		$auth->dispel();
	}*/
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>FireServer Admin</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="logo_fireserver_wf.png"</a> <span class="label label-danger">Vers&atilde;o Teste - N&atilde;o usar em produ&ccedil;&atilde;o - Test Version - Do Not Use on live</span>
    </div>
<?php    
	echo '<div class="navbar-collapse collapse">';
		echo '<ul class="nav navbar-nav navbar-right">';        
			echo '<li class="dropdown">';
          			echo '<a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">';
				if (isset($user)){
				     echo '<i class="glyphicon glyphicon-user"></i>' ;
				}
				echo (isset($user) ? " " .$user->getName() : '');
				if (isset($user)){
					echo '<span class="caret"></span>';
				}
				echo '</a>';
					if (isset($user)){
						echo '<ul id="g-account-menu" class="dropdown-menu" role="menu">';
						echo '<li><a href="#">Meu Perfil</a></li>';
					}
				echo '</ul>';
			echo '</li>';
			if (isset($user)){
        			echo '<li><a href="#" onclick=' . 'javascript:window.location.href="login.php"; return false;' . '><i class="glyphicon glyphicon-lock"></i> Sair</a></li>';
			}
      		echo '</ul>';
    echo '</div>';

?>
  </div><!-- /container -->
</div>
<!-- /Header -->

