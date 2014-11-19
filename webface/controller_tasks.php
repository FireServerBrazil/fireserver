<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>
<?php
	include('./httpful.phar');

	class FireCoreProxyTasks {

		static $base_uri = "http://localhost:8012/tasks";
		
		private $datetime = "";

		private function registerHandles() {		
			$json_handler = new Httpful\Handlers\JsonHandler(array('decode_as_array' => true));
			Httpful\Httpful::register('application/json', $json_handler);
		}

		/*ToDo: Encontrar uma maneira de tratar o response sem precisar fazer a pog abaixo*/
		private function parserResponse($response_data){
			$aux = spliti('=>',$response_data);
			$aux = $aux[0];
			$aux = substr($aux, 4);
			$aux = str_replace("}","",$aux);
			$aux = str_replace(" ","",$aux);
			$aux = spliti(':', $aux);
			$aux = $aux[1];
			$aux = ltrim($aux);
			$aux = rtrim($aux);
			return $aux;
		}
		/*ToDo: Encontrar uma maneira de tratar o response sem precisar fazer a pog abaixo*/
		private function parserResponseFieldDateTime($response_data){
			$aux = spliti('=>',$response_data);
			$aux = $aux[0];
			$aux = substr($aux, 4);
			$aux = str_replace("}","",$aux);
			$aux = ltrim($aux);
			$aux = rtrim($aux);
			$aux = str_replace('": "','":"',$aux);
			$aux = spliti('":"', $aux);
			$aux = str_replace('"', '', $aux[1]);
			return $aux;
		}

		public function getServerName(){
			self::registerHandles();
			$uri = self::$base_uri . "/servername/";
			try {
				$response = \Httpful\Request::get($uri)->send();
				$result = self::parserResponse($response);
				return $result;	
			} catch( Exception $e ) {
				echo $e->getMessage();
			}
		} 	  

		public function getServerDateTime($datepart){
			self::registerHandles();
			$uri = self::$base_uri . "/currentdatetime/";
			try {
				$response = \Httpful\Request::get($uri)->send();
				$result = self::parserResponseFieldDateTime($response);
				$datetime =  explode(' ', $result);
				return ($datepart == 'date') ? $datetime[0] : $datetime[1];		
			} catch( Exception $e ) {
				echo $e->getMessage();
			}
		}
		public function changeHostName($hostname){
			self::registerHandles();
			$uri = self::$base_uri . "/changehostname/";
			try {
	   			$response = \Httpful\Request::put($uri)	->sendsJson()
  									->body('{"hostname":"' . $hostname .'"}')
								        ->send();
			} catch( Exception $e ) {
				echo $e->getMessage();
			}
		}

		public function changeDataTime($datetime){
			self::registerHandles();
			$uri = self::$base_uri . "/changedatetime/";
			try {
	   			$response = \Httpful\Request::put($uri)	->sendsJson()
  									->body('{"newdatetime":"' . $datetime .'"}')
								        ->send();
			} catch( Exception $e ) {
				echo $e->getMessage();
			}
		}  	    	  
		
		public function executeServerShutdownOrRestart($operation){
			self::registerHandles();
			$custom_uri = ($operation == "shutdown") ? "/serverdown/" : "/restartserver/";
			$uri = self::$base_uri . $custom_uri;
			try {
				$response = \Httpful\Request::get($uri)->send();
			} catch( Exception $e ) {
				echo $e->getMessage();
			}

		}

	}
	

	//var_dump($_POST['form']);

	/* Trata requisições post do formulário*/
		
	if(isset($_POST['form']) && ($_POST['form'] == 'formConfig')){

	
		/* Existe um formato para envio do campo ao firecore

		Formato: MMDDhhmmYYYY.ss 
	        Comentários: MM is the month, 01-12; DD is the day, 01-31; hhmm is the time, 0000-2359; YYYY is the optional year, and .ss is the 			optional seconds. */

		$newhostname = $_POST["servername"];
		$newdate     = $_POST["date"];
		$newtime     = $_POST["time"];		
		
		if(!empty($newhostname) || !empty($newdate) || !empty($newtime)){

			$newdate = spliti("/", $newdate);	
			$newtime = spliti(":", $newdate);	
		
			$newdatetime = $newdate[1] . $newdate[0]. $newtime[0] . $newtime[1] . $newdate[2] . "." . $newtime[2];


			$mgmTasks = new FireCoreProxyTasks();
			$mgmTasks->changeHostName($newhostname);
			$mgmTasks->changeDataTime($newdatetime);		
		}	
				

	}

	if(isset($_POST['form']) && ($_POST['form'] == 'formDesligar')){

		$operacao = $_POST["operacao"];
		$motivo   = $_POST["motivo"];

		if(!empty($operacao) || !empty($motivo)){

			$mgmTasks = new FireCoreProxyTasks();
			if($operacao == "Desligar"){
				$mgmTasks->executeServerShutdownOrRestart("shutdown");
			}else{
				$mgmTasks->executeServerShutdownOrRestart("restart");
			} 					
		}
	}

?>
