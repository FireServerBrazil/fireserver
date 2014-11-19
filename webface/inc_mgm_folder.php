<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>
<!-- jQuery and jQuery UI (REQUIRED) -->
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<!-- elFinder CSS (REQUIRED) -->
<link rel="stylesheet" type="text/css" href="elFinder/css/elfinder.min.css">
<link rel="stylesheet" type="text/css" href="elFinder/css/theme.css">
<!-- elFinder JS (REQUIRED) -->
<script src="elFinder/js/elfinder.min.js"></script>
<script>
$(document).ready(function() {
	$("#mgm_container").load("inc_mgm_folder_right.php");
});
</script>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="glyphicon glyphicon-folder-open pull-right"></i>
                      	<h4>Gerenciador de Arquivos</h4>
		</div>
		<div id="mgm_container"></div>
	</div>
	<div class="panel-body">
	</div><!--/panel content-->
</div><!--/panel-->
