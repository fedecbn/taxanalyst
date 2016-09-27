<?php

function en_tete($page)
	{

	include_once "connect.inc.php";
	
	/**/
	/*Partie 1 : construction de l'en tête*/
	/**/

	// activation des onglets en fonction de la page activée
	$tab = array();
	$tab[$page] = "class='active'";


?>

<!-- Les onglets -->
<div id='entete'>
	<div id ='intro'>
	Application web d'analyse des différentes versions de TAXREF
	</div>
	<div id ='onglet'>
		<ul id='tabnav'>
			<li <?php if (isset($tab['ptf_accueil'])) {echo $tab['ptf_accueil'];}?>><a href='index.php'>Accueil</a></li>
			<li <?php if (isset($tab['ptf_action'])) {echo $tab['ptf_action'];}?>><a href='ptf_action.php'>Suivi Taxon TAXREF</a></li>
		</ul>
	</div>
</div>
<?php
	}
	?>