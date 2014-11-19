<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>
<div class="col-md-3">
      <!-- Left column -->
      <a href="#"><strong><i class="glyphicon glyphicon-wrench"></i> Ferramentas</strong></a>  
      
      <hr>
      
      <ul class="list-unstyled">
          <li class="nav-header"><a href="#" data-toggle="collapse" data-target="#userMenu">
          <h5>Configurações <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
            <ul class="list-unstyled collapse" id="userMenu">
                <li> <a href="./index.php?param=cnfg_srv"><i class="glyphicon glyphicon-hdd"></i> Configurar Servidor</a></li>
                <li><a href="./index.php?param=cnfg_net"><i class="glyphicon glyphicon-play-circle"></i> Configurar Rede</a></li>
                <!--<li><a href="./index.php?param=cnfg_bkp"><i class="glyphicon glyphicon-download-alt"></i> Configurar Backup</a></li>-->
                <!--<li><a href="#"><i class="glyphicon glyphicon-time"></i> Configurar Desligamento</a></li>-->
                <!--<li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Configurar Email</a></li>-->
            </ul>
        </li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2">
          <h5>Tarefas <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse" id="menu2">
                <li><a href="./index.php?param=task_shut_restart"><i class="glyphicon glyphicon-record"></i> Desligamento do Servidor</a></li>
                <!--<li><a href="#"><i class="glyphicon glyphicon-export"></i> Backup</a></li>-->
                <!--<li><a href="#"><i class="glyphicon glyphicon-import"></i> Restore</a></li>-->
                <!--<li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> An&aacute;lise do Servidor</a></li>-->
                <!--<li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> An&aacute;lise do Hardware</a></li>-->
            </ul>
        </li>
        <li class="nav-header">
        <a href="#" data-toggle="collapse" data-target="#menu3">
            <h5>Seguran&ccedil;a <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse" id="menu3">
		<li><a href="./index.php?param=mgm_users"><i class="glyphicon glyphicon-user"></i> Usuários</a></li>
		<!--<li><a href="#"><i class="glyphicon glyphicon-pencil"></i> Alterar senha</a></li>-->
                <!--<li><a href="#"><i class="glyphicon glyphicon glyphicon glyphicon-zoom-in"></i> Auditoria</a></li>-->
            </ul>
        </li>
        
        
                <li class="nav-header">
        <a href="#" data-toggle="collapse" data-target="#menu4">
            <h5>Ferramentas <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse" id="menu4">
                <li><a href="./index.php?param=mgm_folder"><i class="glyphicon glyphicon-folder-close"></i> Gerenciador de arquivos</a></li>
            </ul>
        </li>
        
      </ul>
           
      <hr>
      
      <a href="#"><strong><i class="glyphicon glyphicon-link"></i> Apps</strong></a>  
      
      <ul class="nav nav-pills nav-stacked">
        <li class="nav-header"></li>
<?php
        echo "<li><a href='#' onclick=". sprintf("window.open('https://%s:8082/'); return false;>", $_SERVER['HTTP_HOST']) . "<i class='glyphicon glyphicon-export'></i> DataGuard</a></li>";
?>
        <!--<li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Ajuda</a></li>-->
      </ul>
      
 
</div><!-- /col-3 -->

