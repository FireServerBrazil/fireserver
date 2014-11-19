<?php 
	session_start();
	session_destroy(); 
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

<?php require "menu_header.php" ?>
<!-- Main -->
<div class="container">
	<div class="row"><br/><br/><br/></div>
	<div class="row">
		<div class="col-md-4"> </div>
    		<div class="col-md-4">
			<div class="row">
				<?php require "inc_login.php" ?>
      			</div><!--/row-->
  		</div><!--/col-span-12-->
		<div class="col-md-4"> </div>
	</div>
</div>
<!-- /Main -->
<?php require "footer.php" ?>
