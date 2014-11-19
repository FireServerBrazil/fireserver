<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="glyphicon glyphicon-wrench pull-right"></i>
			<h4>Autenticação</h4>
		</div>
	</div>
	<div class="panel-body">
		<form name="formLogin" class="form form-vertical" action="login_control/control.php" method="post">                       
			<input name="form" type="hidden" class="form-control" value="formLogin">
			<input name="name_action" type="hidden" class="form-control" value="login">
			<div class="control-group">
				<label>Login</label>
				<div class="controls">
					<input name="login" type="text" class="form-control" placeholder="Enter Login">
				</div>
			</div>      
			<div class="control-group">
				<label>Password</label>
				<div class="controls">
					<input name="passwd" type="password" class="form-control" placeholder="Enter Password">
				</div>
			</div>
			<div class="control-group">
				<label></label>
				<div class="controls">
					<button type="submit" class="btn btn-primary"> Entrar </button>
				</div>
			</div>                           
		</form>                
	</div><!--/panel content-->
</div><!--/panel-->
