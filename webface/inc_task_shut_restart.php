<?php
	include('./controller_tasks.php');

	$mgmTasks = new FireCoreProxyTasks();

	$server = $mgmTasks->getServerName();
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="glyphicon glyphicon-wrench pull-right"></i>
                      	<h4>Desligamento do Servidor</h4>
		</div>
	</div>
	<div class="panel-body">
	<form name="formDesligar" class="form form-vertical" method="post" action="controller_tasks.php">
		<div class="control-group">
			<input type="hidden" name="form" value="formDesligar">
			<label>Nome do Servidor</label>
			<div class="controls">
			<?php
			 	echo '<input name="servername" type="text" class="form-control" placeholder="Nome do Servidor" value=' .$server .' disabled>'
			?>
	
			</div>
		</div>      
		<div class="control-group">
			<label>Selecione a opção desejada</label>
			<div class="controls">
				<input type="radio" name="operacao" value="desligar"> <Label> Desligar </label>
			</div>
			<div class="controls">
				<input type="radio" name="operacao" value="reiniciar"> <Label> Reiniciar </Label> 
			</div>
		</div>   
		<div class="control-group">
			<label>Motivo</label>			
			<div class="controls">
				<textarea name="motivo" class="form-control" placeholder="Informe o motivo do operação"></textarea>
			</div>
		</div>                           
		<div class="control-group">
			<label></label>
			<div class="controls">
				<button type="submit" class="btn btn-primary">Executar</button>
			</div>
		</div>   
	</form>
	</div><!--/panel content-->
</div><!--/panel-->
