<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>
<strong>Últimos Registros</strong>         
<table class="table table-striped">
                      <thead>
                        <tr><th>Data</th><th>Hora</th><th>Status</th></tr>
                      </thead>
                      <tbody>
                        <tr><td>01/06/2014</td><td>23:55</td><td>Finalizado sem Erro</td></tr>
                        <tr><td>02/06/2014</td><td>23:55</td><td>Erro na execução</td></tr>
                      </tbody>
</table>

<hr>



