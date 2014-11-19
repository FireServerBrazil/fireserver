<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>
<?php require "menu_header.php" ?>
<!-- Main -->
<div class="container">
	<div class="row">
		<?php require "menu_side.php" ?>
		<?php 
			if(isset($_GET["param"])){
				$param = $_GET["param"]; 
			}else{
				$param = "";
			}
			if(isset($_GET["selectID"])){
				$selectID = $_GET["selectID"]; 
			}else{
				$selectID = "";
			}			
			
		?>
    		<div class="col-md-9">
			<?php require "menu_title.php" ?>
			<div class="row">
				<?php if ($param != "mgm_folder"){ ?>  
					<!-- center left-->
					<div class="col-md-6"> 
						<?php require 'content_left.php'?>
          				</div><!--/col-span-6-->
                			<div id="content" class="col-md-6">
                    				<?php require 'content_right.php'?>
					</div><!--/col-span-6-->
				 <?php } elseif ($param == "mgm_folder"){ ?>
                			<div class="col-md-12">
						<?php require 'content_left.php'; ?>
					</div><!--/col-span-12 -->
				 <?php }?>
      			</div><!--/row-->
  		</div><!--/col-span-12-->
	</div>
</div>
<!-- /Main -->
<?php require "footer.php" ?>
