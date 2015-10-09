<?php
require_once('requete.php');	/*mise en page des tableaux + gestion des en-têtes + gestion de toutes les requêtes*/
require_once('URL_carte.php');	/*mise en page des tableaux + gestion des en-têtes + gestion de toutes les requêtes*/

/* Initialisation des variables */
$vide = 0;

if (isset($_POST["search"]))
	{
	$nom_taxon = $_POST["search"];
		
	/*Test de sécurité*/
	if (strstr(str_replace("&amp;","",$nom_taxon),";") != FALSE)	/*Ne pas introduire de requête SQL dans le formulaire*/
		{
		echo "mauvaise entrée, merci de respécifier le cd_nom<BR>";
		}
	elseif ($nom_taxon == "")	/*Ne pas introduire de champ vide dans le formulaire*/
		{
		echo "merci de spécifier le cd_nom du taxon<BR>";
		}
	else
		{
		/*En tête de colonne des tableau*/
		/*Les en-têtes de colonnes sont gérés dans le fichiers tableau.php*/
		
		$nom_taxon = str_replace("&amp;","&",$nom_taxon); /*Attention, passage par la méthode GET de & devient &amp;*/
		
		/*Requete simple*/
		$requete = requete($nom_taxon);		
		$query_cd_ref = $requete[0];$query_nom = $requete[1];$query_nom_verna = $requete[2];$query_classification = $requete[3];
		
		/*Requete territoriale*/
		$select_region = requete_territoire('REG',$nom_taxon);$select_dpt = requete_territoire('DEP',$nom_taxon);$select_cbn = requete_territoire('CBN',$nom_taxon);
		}
	
	/*TABLEAU NOM(S) SCIENTIFIQUE(S) ET VERNACULAIRE(S)*/
	$out1 = query_bdd($connexion2,$query_cd_ref,1);$out2 = query_bdd($connexion2,$query_nom,1);$out3 = query_bdd($connexion2,$query_nom_verna,1);	
	if (isset($out1) OR isset($out2) OR isset($out3) OR isset($out4))
		{
		if(empty($out1) AND empty($out2) AND empty($out3) AND empty($out4))
			{
			echo "<BR>Aucun renseignement agrégé sur ce taxon concernant NOM(S) SCIENTIFIQUE(S) ET VERNACULAIRE(S)<BR>";
			}
		else
			{
			echo "<h3>NOM(S) SCIENTIFIQUE(S) ET VERNACULAIRE(S)</h3>";
			echo "<TABLE id = 'prez'>";
			echo "<TR><TD><b>cd_ref du taxon</b></TD><TD><b>nom(s) valide(s) CBN</b></TD><TD><b>nom valide TAXREF v7</b></TD><TD><b>nom(s) vernaculaire(s) CBN</b></TD></TR>";
			echo "<TR><TD>".$out1[0]."</TD><TD>".implode('<BR>',$out2)."</TD><TD>".$nom_taxon."</TD><TD>".implode('<BR>',$out3)."</TD></TR>";
			echo "</TABLE>";
			}
		}

	/*TABLEAU CLASSIF - Tableau supprimé car pas forcement utile*/
	/*
	$titre = "CLASSIFICATION";
	$vide2 = tableau($connexion2,$query_classification,$param2,$titre,0); /*produit le tableau et retour $vide++ si pas de réponse"
	if ($vide2 == 1)
		{
		echo "<BR>Aucun renseignement agrégé sur ce taxon concernant $titre<BR>";
		}
	*/

	/*TABLEAU STATUT(S)*/
	/* NIVEAU RÉGIONAL*/
	$titre = "STATUT(S) DU TAXON - RÉGION";
	$vide = tableau($connexion2,$select_region,$param,$titre,$vide); /*produit le tableau et retour $vide++ si pas de réponse"*/
	
	/*Carto*/
	$cd_ref = $out1[0];
	$URL = URL_carte($input,$out1[0]);
	// var_dump($URL);echo "<BR>";
	foreach($URL as $key => $value)
		{
		// echo "<a href=\"#\" class=\"bulle\"><img src=\"".$value['thumb']."\"  alt=\"Pas de carte disponible\" title=\"Carte de carte $key régional de $nom_taxon\" style=\"border: 1px solid #00885A;\" /><span><img src=\"".$value['normal']."\" alt=\"Pas de carte $key disponible\" title=\"Carte $key régional de $nom_taxon\" /></span></a>";
		if (!file_exists("cartes/".$key."_".$cd_ref.".jpg") OR filesize("cartes/".$key."_".$cd_ref.".jpg") == 0)
			{
			// echo $value['normal']."<BR>";
			$img = file_get_contents($value['normal']);
			file_put_contents("cartes/".$key."_".$cd_ref.".jpg",$img);
			if (filesize("cartes/".$key."_".$cd_ref.".jpg") == 0)
				{
				unlink("cartes/".$key."_".$cd_ref.".jpg",$img);
				sleep(3);
				$img = file_get_contents($value['normal']);
				file_put_contents("cartes/".$key."_".$cd_ref.".jpg",$img);
				}
			}
		if (!file_exists("cartes/".$key."_".$cd_ref.".thumb.jpg") OR filesize("cartes/".$key."_".$cd_ref.".thumb.jpg") == 0)
			{
			$img_thumb = file_get_contents($value['thumb']);
			unlink("cartes/".$key."_".$cd_ref.".thumb.jpg",$img);
			file_put_contents("cartes/".$key."_".$cd_ref.".thumb.jpg",$img_thumb);
			if (filesize("cartes/".$key."_".$cd_ref.".thumb.jpg") == 0)
				{
				unlink("cartes/".$key."_".$cd_ref.".thumb.jpg",$img);
				sleep(3);
				$img_thumb = file_get_contents($value['thumb']);
				file_put_contents("cartes/".$key."_".$cd_ref.".thumb.jpg",$img_thumb);
				}
			}
		echo "<a href=\"#\" class=\"bulle\"><img src=\"cartes/".$key."_".$cd_ref.".thumb.jpg\"  alt=\"Pas de carte disponible\" title=\"Carte de carte $key régional de $nom_taxon\" style=\"border: 1px solid #00885A;\" /><span><img src=\"cartes/".$key."_".$cd_ref.".jpg\" alt=\"Pas de carte $key disponible\" title=\"Carte $key régional de $nom_taxon\" /></span></a>";
		}
		

	/*NIVEAU DÉPARTEMENTAL*/
	$titre = "STATUT(S) DU TAXON - DÉPARTEMENT";
	$vide = tableau($connexion2,$select_dpt,$param,$titre,$vide); /*produit le tableau et retour $vide++ si pas de réponse"*/
	
	/*NIVEAU CBN*/
	$titre = "STATUT(S) DU TAXON - DÉPARTEMENT";
	$vide = tableau($connexion2,$select_cbn,$param,$titre,$vide); /*produit le tableau et retour $vide++ si pas de réponse"*/

	/*Si aucun résultat*/
	if ($vide == 3)
		{
		echo "<BR>Aucun renseignement agrégé sur ce taxon concernant STATUT(S) DU TAXON<BR>";
		}
	}
