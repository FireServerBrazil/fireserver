<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>
<div class="panel panel-default">
                	<div class="panel-heading">
                      	<div class="panel-title">
                  		<i class="glyphicon glyphicon-wrench pull-right"></i>
                      	<h4>Configurar Backup</h4>
                      	</div>
                	</div>
                	<div class="panel-body">

                      <form class="form form-vertical">
                       
                        <div class="control-group">
                          <label>Hora e Minuto</label>
                          <div class="controls">
                           <input type="text" class="form-control" placeholder="Informe o horário do backup">
                          </div>
                        </div> 
                          
                        
                        <div class="control-group">
                          <label>Dias</label>
                          <div class="controls">
                            <input type="checkbox" class="form-group"> Segunda
                            <input type="checkbox" class="form-group"> Terça
                            <input type="checkbox" class="form-group"> Quarta
                            <input type="checkbox" class="form-group"> Quinta
                            <input type="checkbox" class="form-group"> Sexta<br><br>
                            <input type="checkbox" class="form-group"> Sabado
                            <input type="checkbox" class="form-group"> Domingo<br><br>
                            <input type="checkbox" class="form-group"> Todos os dias
                          </div>
                        </div>
                        
                        <div class="control-group">
                          	<label></label>
                        	<div class="controls">
                        	<button type="submit" class="btn btn-primary"> Enviar
                            </button>
                        	</div>
                        </div>   
                        
                      </form>
                
                
                  </div><!--/panel content-->
                </div><!--/panel-->
