	<body >
		<div class="divBody">
  		<?php	
  			include("nav.php");
			include("header.php");


		  echo $module->getControleur()->getVue()->getContenu(); 
			include("footer.php");
		?>
		</div>
	</body>
