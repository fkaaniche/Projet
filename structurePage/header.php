<header>

	<h1 id="titreSite">Voyages</h1>
	<h1 id="titreSite2">Voyages</h1>

	<script type="text/javascript">
 	$(window).scroll(function()
{
	node = document.getElementById("titreSite");
	node2 = document.getElementById("titreSite2");
	alert("salut");

	node2.style.visibility="hidden";
    var scroll = window.scrollTop();
    	if (scroll<30)
	{
		// Contenu caché, le montrer
		node.style.visibility = "visible";
		node2.style.visibility ="hidden";
	}
	else
	{
		// Contenu visible, le cacher
		node.style.visibility = "hidden";
		node2.style.visibility ="visible";	
	}
})	; 			


 	</script>

	<a href="index.php?module=accueil" > <img id="banner" src= images/banner.jpg /> </a>



</header>
