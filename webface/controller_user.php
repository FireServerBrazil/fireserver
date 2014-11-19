<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>

<?php
	/*Arrays form user status and role*/
	$arrayOfStatus = array(1 => 'Ativo', 2 => 'Inativo');
        $arrayOfRole = array(-1 => 'Selecione o perfil', 
			      1 => 'Administrador do Sistema', 
			      2 => 'Administrador de Banco de Dados',
			      3 => 'Analista de Suporte',
			      4 => 'Analista de Redes',
			      5 => 'Consultor');

	if(!class_exists('Httpful\\Bootstrap')){
		include('./httpful.phar');
	}
	if(!class_exists('FireCoreManagerUsersProxy')){
		class FireCoreManagerUsersProxy{
			static $base_uri = "http://localhost:8012/auth/api";

			public $userID = "";
			public $name = "";
			public $nickname = "";
			public $email = "";
			public $password = "";
			public $role = "";
			public $status = "";
			public $date_created = "";
			public $date_modified = "";

			private function registerHandles() {		
				$json_handler = new Httpful\Handlers\JsonHandler(array('decode_as_array' => true));
				Httpful\Httpful::register('application/json', $json_handler);
			}

			public function encapsulateRequest(){
			    if(!empty($_POST["id"])){ 	
			    	$this->userID   = $_POST["id"];
			    }
			    $this->name     = $_POST["name_of_user"];
    			    $this->nickname = $_POST["login"];
			    $this->email    = $_POST["email"];
			    $this->role     = $_POST["id_role"];
			    $this->status   = $_POST["id_state"];
			    $this->passwd   = $_POST["passwd"];
			}
			public function getUserList(){
				self::registerHandles();
				$uri = self::$base_uri . "/users/list/";
				try {
					$response = \Httpful\Request::get($uri)->send();
					return $response;		
				} catch( Exception $e ) {
					echo $e->getMessage();
				}			
			}
			public function getUserByID($id){
				self::registerHandles();
				$uri = self::$base_uri . "/user/" . $id ;
				try {
					$response = \Httpful\Request::get($uri)->send();
					return $response;		
				} catch( Exception $e ) {
					echo $e->getMessage();
				}				
			}
			public function changeUserRegistration(){
				self::registerHandles();
				$uri = self::$base_uri . "/updateuser";							   
				self::encapsulateRequest();
				try {
					$response = \Httpful\Request::put($uri)
						->sendsJson()
						->body('{"user_id" : "'. $this->userID .'", "username":"' . $this->name . '", 
                                                         "nickname": "' . $this->nickname . '", "email" : "' . $this->email . '", 
							 "role" : "'. $this->role . '", "state" : "' . $this->state . '", 
							 "passwd" : "'. (!empty($this->passwd) ? $this->passwd : '') . '"}')
					        ->send();
					return $response;		
				} catch( Exception $e ) {
					echo $e->getMessage();
				}				
			}
			public function registrationUser(){
				self::registerHandles();
				$uri = self::$base_uri . "/newuser";
				self::encapsulateRequest();
				try {
					$response = \Httpful\Request::put($uri)
						->sendsJson()
						->body('{"username":"' . $this->name . '", 
                                                         "nickname": "' . $this->nickname . '", "email" : "' . $this->email . '", 
							 "role" : "'. $this->role . '", "state" : "' . $this->state . '", 
							 "passwd" : "'. $this->passwd . '"}')
					        ->send();
					return $response;		
				} catch( Exception $e ) {
					echo $e->getMessage();
				}				
			}
			public function deleteUserByID($id){
				self::registerHandles();
				$uri = self::$base_uri . "/user/delete/" . $id ;
				try {
					$response = \Httpful\Request::get($uri)->send();
					return $response;		
				} catch( Exception $e ) {
					echo $e->getMessage();
				}				
			}											

			public function loginUser(){
				self::registerHandles();
				$uri = self::$base_uri . "/login/" . $id ;
				try {
					$response = \Httpful\Request::put($uri)
						->sendsJson()
						->body('{"username":"' . $this->name . '", 
							 "passwd" : "'. $this->passwd . '"}')
					        ->send();

					return $response;		
				} catch( Exception $e ) {
					echo $e->getMessage();
				}				
			}	
		}
	}
	if(isset($_POST['form']) && ($_POST['form']=='formUser')){
		if(isset($_POST['name_action']) && ($_POST['name_action']=='insert')){
			$mgmUsers = new FireCoreManagerUsersProxy();
			$data = $mgmUsers->registrationUser();  
			header('Location: ./index.php?param=mgm_users');
	  	}
		if(isset($_POST['name_action']) && ($_POST['name_action']=='update')){
			$mgmUsers = new FireCoreManagerUsersProxy();
			$data = $mgmUsers->changeUserRegistration();
			header('Location: ./index.php?param=mgm_users');
		}
		if(isset($_POST['name_action']) && ($_POST['name_action']=='delete')){
			$mgmUsers = new FireCoreManagerUsersProxy();
			$selectedUser = $_POST['id'];
			$data = $mgmUsers->deleteUserByID($selectedUser);
			header('Location: ./index.php?param=mgm_users');
		}
	}

	if(isset($_POST['form']) && ($_POST['form']=='formLogin')){
		if(isset($_POST['name_action']) && ($_POST['name_action']=='login')){
			$mgmUsers = new FireCoreManagerUsersProxy();
			$mgmUsers->passwd   = $_POST["passwd"];
    			$mgmUsers->nickname = $_POST["login"];
			$data = $mgmUsers->loginUser();  
			header('Location: ./index.php');
	  	}
	}



?>


