	<body >
		<div>
  		<?php	
			include("header.php");
			include("nav.php");
		  echo $module->getControleur()->getVue()->getContenu(); 
			include("footer.php");
		?>
		</div>
	</body>
