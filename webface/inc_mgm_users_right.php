<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>
<strong>Usuários Credenciados</strong>         
<table class="table table-striped">
	<thead>
		<tr><th>Nome</th><th>Login</th><th>E-mail</th><th>Status</th><th></th></tr>
        </thead>
        <tbody>
<?php
	include('./controller_user.php');
	$mgmUsers = new FireCoreManagerUsersProxy();
	$data = $mgmUsers->getUserList();        
	$listUsers = json_decode($data, true);
	foreach ($listUsers as $user){
		
		echo '<tr><td> ' . $user['name'] . '</td><td>' . utf8_decode($user['nickname']) . '</td><td>' . utf8_decode($user['email']) .'</td><td>' . $arrayOfStatus[$user['status']] . '</td><td> <a href="./index.php?param=mgm_users&selectID=' . $user['id'] . '"><i class="glyphicon glyphicon-pencil"></i></a><a href="./index.php?param=mgm_users&selectID=' . $user['id'] . '&delete=true"><i class="glyphicon glyphicon-trash"></i></a></td></tr>';		
	}	
?>
	</tbody>
</table>
