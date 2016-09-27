<?php

	/** Drapeau*/	
	$a = 0;
	
	if (isset($_POST["nom_complet"]))
		{
		/*Test de sécurité*/
		if (strstr($_POST["nom_complet"],";") != FALSE)
			{
			echo "mauvaise entrée, merci de respécifier le nom du taxon<BR>";
			}
		elseif ($_POST["nom_complet"] == "")
			{
			echo "merci de spécifier le nom du taxon<BR>";
			}
		else
			{
			if (isset($_POST["recherche"]))
				{
				if ($_POST["recherche"] == "begin") {$like = $_POST["nom_complet"]."%";}
				elseif ($_POST["recherche"] == "middle") {$like = "%".$_POST["nom_complet"]."%";}
				elseif ($_POST["recherche"] == "end") {$like = "%".$_POST["nom_complet"];}
				else {$like = "%".$_POST["nom_complet"]."%";}
				}
			else
				{
				echo "merci de selectionner un mode de recherche<BR>";
				$like = "%".$_POST["nom_complet"]."%";
				}
			
			$query = "Select nom_complet, 8 as version, cd_nom from taxrefv80_utf8 WHERE lower(nom_complet) LIKE lower('$like')
				UNION
				Select nom_complet, 7 as version, cd_nom from taxrefv70_utf8 WHERE lower(nom_complet) LIKE lower('$like')
				UNION
				Select nom_complet, 6 as version, cd_nom  from taxrefv60_utf8 WHERE lower(nom_complet) LIKE lower('$like')
				UNION
				Select nom_complet, 5 as version, cd_nom  from taxrefv50_utf8 WHERE lower(nom_complet) LIKE lower('$like')
				UNION
				Select nom_complet, 4 as version, cd_nom  from taxrefv40_utf8 WHERE lower(nom_complet) LIKE lower('$like')
				UNION
				Select nom_complet, 3 as version, cd_nom  from taxrefv30_utf8 WHERE lower(nom_complet) LIKE lower('$like')
				UNION
				Select nom_complet, 2 as version, cd_nom  from taxrefv20_utf8 WHERE lower(nom_complet) LIKE lower('$like')
				ORDER BY nom_complet ASC, version DESC
				";
			$table = query_bdd($connexion,$query,3);		//$table est un tableau de tableaux. chaque "case correspond à la liste de toutes les valeur d'un attribut
			//print_r($table);
			//echo $query;
			
			/** Construction de la table (passage de l'horizontal au vertical*/
			if (isset($table))
				{
				if (empty($table)) 
					{
					echo "Aucun taxon n'a été trouvé dans TaxRef avec cette orthographe<BR>";
					}
				else
					{
					$nb_reponse = count($table[0]);
					
					For ($i=0; $i<$nb_reponse-1; $i++)
						{
						$nom_taxon[$a] = $table[0][$i];
						$version = $table[1][$i];
						$cd_nom[$a][$version] = $table[2][$i];
						if (str_replace(' ','',$table[0][$i+1]) != str_replace(' ','',$table[0][$i]))
							{
							$a = $a+1;
							}			
						}
						/* Dernière ligne*/
						$nom_taxon[$a] = $table[0][$nb_reponse-1];
						$version = $table[1][$nb_reponse-1];
						$cd_nom[$a][$version] = $table[2][$nb_reponse-1];
					
					echo "<h3>Résultat de la requête</h3>";
					echo '<b>'.($a+1).'</b> taxon(s) ont été trouvé(s)<BR><BR>';
					echo "<TABLE id = 'prez'><TR><TD>Nom scientifique du taxon</TD><TD>cd_nom taxref_v8</TD><TD>cd_nom taxref_v7</TD><TD>cd_nom taxref_v6</TD><TD>cd_nom taxref_v5</TD><TD>cd_nom taxref_v4</TD><TD>cd_nom taxref_v3</TD><TD>cd_nom taxref_v2</TD></TR>";
					For ($j=0; $j<=$a; $j++)
						{
						echo "<TR><TD>";
						if (isset($nom_taxon[$j])) {echo $nom_taxon[$j];}
						echo "</TD>";
						echo "<TD>";
						if (isset($cd_nom[$j]['8'])) {echo $cd_nom[$j]['8'];}
						echo "</TD>";
						echo "<TD>";
						if (isset($cd_nom[$j]['7'])) {echo $cd_nom[$j]['7'];}
						echo "</TD>";
						echo "<TD>";
						if (isset($cd_nom[$j]['6'])) {echo $cd_nom[$j]['6'];}
						echo "</TD>";
						echo "<TD>";
						if (isset($cd_nom[$j]['5'])) {echo $cd_nom[$j]['5'];}
						echo "</TD>";
						echo "<TD>";
						if (isset($cd_nom[$j]['4'])) {echo $cd_nom[$j]['4'];}
						echo "</TD>";
						echo "<TD>";
						if (isset($cd_nom[$j]['3'])) {echo $cd_nom[$j]['3'];}
						echo "</TD>";
						echo "<TD>";
						if (isset($cd_nom[$j]['2'])) {echo $cd_nom[$j]['2'];}
						echo "</TD></TR>";
						}
					}

				}
			}
		}
	