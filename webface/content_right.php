<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>

<?php
	if ($param =="cnfg_net") {
        	require "inc_cnfg_net_right.php";
        }  
        if ($param =="cnfg_bkp") {
        	require "inc_cnfg_bkp_right.php";
        }                     

	if ($param =="mgm_users") {
        	require "inc_mgm_users_right.php";
        }  
/*        if ($param =="mgm_folder") {
        	require "inc_mgm_folder_right.php";
        }                     */
	if ($param =="") {
?>
<div class="panel panel-default">
	<div class="panel-heading"><h4>Últimas operações</h4></div>
	<div class="panel-body">
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">×</button>
			Alertas aparecem nesta classe.
		</div>
		Lista das últimas operações aqui
		<br><br>
		Buscar as últimas operações do Log.
	</div>
</div>
<?php
   }
?>
