<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>

<?php
	include('./controller_tasks.php');

	$mgmTasks = new FireCoreProxyTasks();

	$server = $mgmTasks->getServerName();
	$date = $mgmTasks->getServerDateTime('date');
	$time = $mgmTasks->getServerDateTime('');
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="glyphicon glyphicon-wrench pull-right"></i>
                      	<h4>Configurar Servidor</h4>
		</div>
	</div>
	<div class="panel-body">
	<form name="formConfig" class="form form-vertical" method="post" action="controller_tasks.php">
		<div class="control-group">
			<input type="hidden" name="form" value="formConfig">
			<label>Nome do Servidor</label>
			<div class="controls">
			<?php
			 	echo '<input name="servername" type="text" class="form-control" placeholder="Nome do Servidor" value=' .$server .'>'
			?>
	
			</div>
		</div>      
		<div class="control-group">
			<label>Data</label>
			<div class="controls">
			<?php
			 	echo '<input name="date" type="text" class="form-control" placeholder="Data" value='. $date .'>'
			?><label> Ex: 00/00/0000 </label>
			</div>
		</div>   
		<div class="control-group">
			<label>Hora</label>
			<div class="controls">
			<?php
			 	echo '<input name="time" type="text" class="form-control" placeholder="Hora" value='. $time .'>'
			?><label> Ex: 00:00:00 </label>
			</div>
		</div>                           
		<div class="control-group">
			<label></label>
			<div class="controls">
				<button type="submit" class="btn btn-primary">Alterar</button>
			</div>
		</div>   
	</form>
	</div><!--/panel content-->
</div><!--/panel-->
