<?php

function en_tete($page)
	{

include "../../base_connexion.php";
	
	/**/
	/*Partie 1 : construction de l'en tête*/
	/**/

// activation des onglets en fonction de la page activée
$tab = array();
$tab[$page] = "class='active'";

 
/* construction de l'en-tête.bandeau*/
?>

<!-- Les onglets -->
<div id='entete'>
	<div id ='intro'>
	Application web pour la production de cartes en masse
	</div>
	<div id ='onglet'>
		<ul id='tabnav'>
			<li <?php if (isset($tab['ptf_accueil'])) {echo $tab['ptf_accueil'];}?>><a href='<?php echo $server; ?>index.php'>Accueil</a></li>
			<li <?php if (isset($tab['ptf_action'])) {echo $tab['ptf_action'];}?>><a href='<?php echo $server; ?>ptf_action.php'>Suivi Taxon TAXREF</a></li>
			<li <?php if (isset($tab['ptf_taxa'])) {echo $tab['ptf_taxa'];}?>><a href='<?php echo $server; ?>ptf_taxa.php'>TAXA - Catalogues CBN</a></li>
			<li <?php if (isset($tab['ptf_noref'])) {echo $tab['ptf_noref'];}?>><a href='<?php echo $server; ?>ptf_noref.php'>TAXA - Taxons non rattachés</a></li>
			<li <?php if (isset($tab['ptf_ces'])) {echo $tab['ptf_ces'];}?>><a href='<?php echo $server; ?>ptf_ces.php'>TAXA - Conservation ex-situ</a></li>
		</ul>
	</div>
</div>
<?php
	}
	?>