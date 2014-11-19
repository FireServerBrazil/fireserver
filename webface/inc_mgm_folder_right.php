<?php 
	require_once 'login_control/user.php';
	require_once 'login_control/authenticator.php'; 
	$auth = Authenticator::instantiate(); 
	if (!$auth->isLoggedIn()) {		
		$auth->dispel();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
		<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="elFinder/css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="elFinder/css/theme.css">
		<!-- elFinder JS (REQUIRED) -->
		<script src="elFinder/js/elfinder.min.js"></script>
		<!-- elFinder translation (OPTIONAL) -->
		<script src="elFinder/js/i18n/elfinder.pt_BR.js"></script>

		<script type="text/javascript">
			var FileBrowserDialogue = {
				init: function() {
				      // Here goes your code for setting your custom things onLoad.
				      },
				 mySubmit: function (URL) {
				      // pass selected file path to TinyMCE
				      parent.tinymce.activeEditor.windowManager.getParams().setUrl(URL);
				      // close popup window
				      parent.tinymce.activeEditor.windowManager.close();
				    }
 			 }

		</script>
		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			// Documentation for client options:
			// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
			$(document).ready(function() {
				$('#elfinder').elfinder({
					url : 'elFinder/php/connector.minimal.php',  // connector URL (REQUIRED)
					getFileCallback: function(file) { // editor callback
						// actually file.url - doesnt work for me, but file does. (elfinder 2.0-rc1)
				        	FileBrowserDialogue.mySubmit(file); // pass selected file path to TinyMCE 
					      },
					lang: 'pt_BR',                    // language (OPTIONAL)
					ui: ['toolbar', 'tree', 'path', 'stat'],
					uiOptions : {
  						  // toolbar configuration
						toolbar : [
						        ['back', 'forward'],
						        // ['reload'],
						        // ['home', 'up'],
						        ['mkdir', 'mkfile', 'upload'],
						        ['open', 'download', 'getfile'],
						        ['info'],
						        //['quicklook'],
						        ['copy', 'cut', 'paste'],
							['rm'],
							['duplicate', 'rename', 'edit', 'resize'],
						        ['extract', 'archive'],
						        ['search'],
						        ['view'],
							//['help']
						    ],
						   // directories tree options
						    tree : {
						        // expand current root on init
						        openRootOnLoad : true,
						        // auto load current dir parents
						        syncTree : true
							},
						    // navbar options
						    navbar : {
						    	minWidth : 150,
						    	maxWidth : 500
						    },
						    // current working directory options
						    cwd : {
						        // display parent directory in listing as ".."
						        oldSchool : false
							}
						}
				});
			});
		</script>
	</head>
<body>
	<!-- Element where elFinder will be created (REQUIRED) -->
	<div id="elfinder"></div>

<!-- <div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="glyphicon glyphicon-folder-open pull-right"></i>
                      	<h4>Gerenciador de Arquivos</h4>
		</div>
		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>
	</div>
	<div class="panel-body">
	</div><!--/panel content-->
</div><!--/panel-->
</body>
</html>
