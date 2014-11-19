<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>

<?php
	include('./controller_user.php');
	$user = "";
	if(isset($_GET['selectID']) && !empty($_GET['selectID'])){
		$selectedUser = $_GET['selectID'];
		$mgmUsers = new FireCoreManagerUsersProxy();
		$data = $mgmUsers->getUserByID($selectedUser);        
		$user = json_decode($data, true);
       }
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="glyphicon glyphicon-user pull-right"></i>
			<h4>Inclusão/Alteração de Usuário</h4>                      	
		</div>
	</div>
	<div class="panel-body">
		<form name="formUser" class="form form-vertical" action="controller_user.php" method="post">
			<input name="form" type="hidden" class="form-control" value="formUser">
<?php
			echo '<input name="name_action" type="hidden" class="form-control" value=' . (empty($_GET['selectID']) ?  'insert' : (empty($_GET['delete']) ? 'update' : 'delete')) .'>';
			echo '<input name="id" type="hidden" class="form-control" value=' . $user['id'] . '>';
?>
			<div class="control-group">
				<div class="controls">
					<label>Nome do usuário</label>
<?php
					echo '<input name="name_of_user" type="text" class="form-control" placeholder="Informe o nome do usuário" required value="' . $user['name'] . '"' . (isset($_GET['delete']) ? 'disabled' : '') .  '>';
?>
				</div>
                        </div> 
                        <div class="control-group">
				<label>Login</label>
                        	<div class="controls">
<?php
                           		echo '<input name="login" type="text" class="form-control" placeholder="Informe o Login" required pattern="\w+" value="' . $user['nickname'] . '" ' . (!empty($_GET['delete']) ? 'disabled' : '') .  '>';
?>
                        	</div>
                        </div>                           
			<div class="control-group">
				<label>Endereço de e-mail</label>
				<div class="controls">
<?php
					echo '<input name="email" class="form-control" type="email" placeholder="Informe o endereço de e-mail" required value="' . $user['email'] . '" ' . (!empty($_GET['delete']) ? 'disabled' : '') .  '>';
?>
				</div>
                        </div>
                        <div class="control-group">
				<label>Perfil do usuário</label>
                        	<div class="controls">
					
<?php
				echo '<select name="id_role" class="form-control" ' . (!empty($_GET['delete']) ? 'disabled' : '') .  '>';
					foreach ($arrayOfRole as $keyRole => $role){					
						echo '<option value="'. $keyRole . '" ' . (($user['role'] == $keyRole) ? 'selected' : '') .  ' >'. $role .'</option>';
					}
				echo '</select>';
?>

				</div>
                        </div>                           
                        <div class="control-group">
				<label>Status do usuário</label>
                        	<div class="controls">
<?php
					echo '<select name="id_state" class="form-control" ' . (!empty($_GET['delete']) ? 'disabled' : '') .  '>';
					foreach ($arrayOfStatus as $keyStatus => $status){					
						echo '<option value="'. $keyStatus . '" ' . (($user['status'] == $keyStatus) ? 'selected' : '') .  ' >'. $status .'</option>';
					}
					echo '</select>';
?>

				</div>
                        </div>                                 
<?php
	if (!empty($_GET['selectID']) || !empty($_GET['delete']) ){
			echo '<div class="control-group">';
				echo '<label>Data de inclusão</label>';
				echo '<div class="controls">';
					echo '<input name="date_created" class="form-control" type="text" disabled value="' . $user['date_created'] . '">';
				echo '</div>';
                        echo '</div>';
			echo '<div class="control-group">';
				echo '<label>Última alteração</label>';
				echo '<div class="controls">';
					echo '<input name="date_modified" class="form-control" type="text" disabled value="' . $user['date_modified'] . '">';
				echo '</div>';
                        echo '</div>';
	}
?>
<?php
	if(empty($_GET['delete'])){
                        echo '<div class="control-group">';
				echo '<label>Senha</label>';
                        	echo '<div class="controls">';			
					echo '<input name="passwd" type="password" class="form-control" placeholder="Informe a senha" 							onchange="form.passwd_retype.pattern = this.value;">';
					echo '<label>Confirmação de senha</label>';
					echo '<input name="passwd_retype" type="password" class="form-control" placeholder="Redigite a senha">';
	                        echo '</div>';
                        echo '</div>';    
	}                 
?>
                        <div class="control-group">
                          	<label></label>
                        	<div class="controls">
<?php
	                      		echo '<button type="submit" class="btn btn-primary">' . ((!empty($_GET['delete'])) ? 'Confirmar exclusão' : 'Salvar') .' </button>';
?>
	                      		<button type="reset" class="btn btn-primary" onclick="location.href='index.php?param=mgm_users';"> Cancelar </button>
                        	</div>
                        </div>   
		</form>
	</div><!--/panel content-->
</div><!--/panel-->
