<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>
<strong>Interfaces Ativas</strong>         
<table class="table table-striped">
                      <thead>
                        <tr><th>Nome</th><th>Tipo</th><th>End. IP</th><th>Máscara</th><th>Estado</th></tr>
                      </thead>
                      <tbody>
                        <tr><td>eth0</td><td>Ethernet</td><td>200.229.4.41</td><td>255.255.255.252</td><td>Ligado</td></tr>
                        <tr><td>eth0</td><td>Ethernet</td><td>200.229.4.42</td><td>255.255.255.252</td><td>Desligado</td></tr>
                      </tbody>
               	</table>
<hr>
<strong>Interfaces Ativadas ao iniciar</strong>         
<table class="table table-striped">
                      <thead>
                        <tr><th>Nome</th><th>Tipo</th><th>End. IP</th><th>Máscara</th><th>Estado</th></tr>
                      </thead>
                      <tbody>
                        <tr><td>eth0</td><td>Ethernet</td><td>200.229.4.41</td><td>255.255.255.252</td><td>Ligado</td></tr>
                        <tr><td>eth0</td><td>Ethernet</td><td>200.229.4.42</td><td>255.255.255.252</td><td>Desligado</td></tr>
                      </tbody>
               	</table>
