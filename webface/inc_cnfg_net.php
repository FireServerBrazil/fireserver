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
                      	<h4>Configurar Servidor</h4>
                      	</div>
                	</div>
                	<div class="panel-body">

                      <form class="form form-vertical">
                       
                        <div class="control-group">
                          <label>Nome da interface</label>
                          <div class="controls">
                           <input type="text" class="form-control" placeholder="Nome da interface">
                          </div>
                        </div> 
                          
                        <div class="control-group">
                          <label>Endereço IP</label>
                          <div class="controls">
                           <input type="text" class="form-control" placeholder="Endereço IP">
                          </div>
                          
                        </div>                           
                        <div class="control-group">
                          <label>Mascara Sub-Rede</label>
                          <div class="controls">
                              <input type="checkbox" class="form-group"> Automático 
                           <input type="text" class="form-control" placeholder="Mascara Sub-Rede">
                          </div>
                        </div> 
                          
                        <div class="control-group">
                          <label>MTU</label>
                          <div class="controls">
                            <input type="checkbox" class="form-group"> Pré-Definido 
                           <input type="text" class="form-control" placeholder="MTU">
                          </div>
                        </div>                           
                          
                        <div class="control-group">
                          <label>Endereço de Hardware</label>
                          <div class="controls">
                            <input type="checkbox" class="form-group"> Pré-Definido 
                           <input type="text" class="form-control" placeholder="Endereço de hardware">
                          </div>
                        </div>                           
                          
                        <div class="control-group">
                          <label>Broadcast</label>
                          <div class="controls">
                            <input type="checkbox" class="form-group"> Automático 
                           <input type="text" class="form-control" placeholder="Broadcast">
                          </div>
                        </div>    
                          
                        <div class="control-group">
                          <label>Estado</label>
                          <div class="controls">
                            <input type="radio" class="form-group"> Ligado
                            <input type="radio" class="form-group"> Desligado 
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
