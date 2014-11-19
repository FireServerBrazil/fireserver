<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>
<!-- column 2 -->	
<?php
	$titulo ="";
	if ($param =="mgm_auth")  $titulo = " Autenticação de Usuário";
	if ($param =="cnfg_srv") $titulo = " Configuração do Servidor";
	if ($param =="cnfg_net") $titulo = " Configuração da Rede";
	if ($param =="cnfg_bkp") $titulo = " Configuração do Backup";
	if ($param =="mgm_folder") $titulo = " Gerenciador de Arquivos";
	if ($param =="mgm_users") $titulo = " Gerenciamento de Usuários";
	if ($param =="task_shut_restart") $titulo = " Controle de Desligamento do Servidor";

?>
<a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> <?php echo $titulo;?></strong></a>  
<hr>
