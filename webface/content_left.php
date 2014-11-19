<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>
            <!-- center left-->	<!-- nao remover -->	
            <?php 
             if ($param) { 
                if ($param =="cnfg_srv") {
                    require "inc_cnfg_srv.php";
                    }
                if ($param =="cnfg_net") {
                    require "inc_cnfg_net.php";
                    }                    
                if ($param =="cnfg_bkp") {
                    require "inc_cnfg_bkp.php";
                    }                  
                if ($param =="mgm_folder") {
                    require "inc_mgm_folder.php";
                    }                 
                if ($param =="mgm_users") {
			if ($selectID){
			    $byPassUserID = $selectID;		 		
	                    require "inc_mgm_users.php";
			}else{
	                    require "inc_mgm_users.php";
			}
                    }                  
		if ($param =="task_shut_restart") {
		    require "inc_task_shut_restart.php";
		}
                 
             } else {?>
            
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Consumo de Recursos </h4></div>
                  <div class="panel-body">
                    
                    <small>CPU</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                        <small>72%</small>
                      </div>
                    </div>
                    <small>Memória</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <small>20%</small>
                      </div>
                    </div>
                    <small>HD</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                        <small>60%</small>
                      </div>
                    </div>
                    </div>

                  </div><!--/panel-body-->
                      
            <?php  } ?>
              
	

   

 

