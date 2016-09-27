<?php

	$select1 = "";
	$select2 = "";
	$select3 = "";
	$select4 = "";
	
	/* drapeau */
	$i = 0;

	/*Test de sécurité*/
	if (strstr($_POST["cd_nom"],";") != FALSE)
		{
		echo "mauvaise entrée, merci de respécifier le cd_nom<BR>";
		}
	elseif ($_POST["cd_nom"] == "")
		{
		echo "merci de spécifier le cd_nom du taxon<BR>";
		}
	else
		{
		if (isset($_POST["codification"]))
			{
			/*Création de l'en-tête*/
			$param[$i] = "cd_taxsup"; $i++; $param[$i] = "cd_ref"; $i++;	
			/*Création de la requête de sélection*/
			$select1 = $select1.", cd_taxsup, cd_ref";
			$select2 = $select2.", cd_taxsup, cd_ref";
			$select3 = $select3.", cd_taxsup, cd_ref";
			$select4 = $select4.", 'non prévu dans cette version' as cd_taxsup, cd_ref";
			}
		if (isset($_POST["rang"]))
			{
			/*Création de l'en-tête*/
			$param[$i] = "rang"; $i++;
			/*Création de la requête de sélection*/
			$select1 = $select1.", rang";
			$select2 = $select2.", rang";
			$select3 = $select3.", rang";
			$select4 = $select4.", rang";
			}
		if (isset($_POST["classif"]))
			{
			/*Création de l'en-tête*/
			$param[$i] = "regne";  $i++; $param[$i] = "phylum";  $i++; $param[$i] = "classe";  $i++; $param[$i] = "ordre";  $i++; $param[$i] = "famille";  $i++; 	
			/*Création de la requête de sélection*/
			$select1 = $select1.", regne, phylum, classe, ordre, famille";
			$select2 = $select2.", regne, phylum, classe, ordre, famille";
			$select3 = $select3.", regne, phylum, classe, ordre, famille";
			$select4 = $select4.", regne, phylum, classe, ordre, famille";
			}
		if (isset($_POST["nomenc"]))
			{
			/*Création de l'en-tête*/
			$param[$i] = "lb_nom";  $i++; $param[$i] = "lb_auteur";  $i++; $param[$i] = "nom_complet";  $i++; $param[$i] = "nom_valide";  $i++; 
			$param[$i] = "nom_vern";  $i++; $param[$i] = "nom_vern_eng";  $i++; 	
			/*Création de la requête de sélection*/
			$select1 = $select1.", lb_nom, lb_auteur, nom_complet, nom_valide, nom_vern, nom_vern_eng";
			$select2 = $select2.", lb_nom, lb_auteur, nom_complet, nom_valide, nom_vern, nom_vern_eng";
			$select3 = $select3.", lb_nom, lb_auteur, nom_complet, nom_valide, nom_vern, nom_vern_eng";
			$select4 = $select4.", lb_nom, lb_auteur, nom_complet, nom_valide, nom_vern, nom_vern_eng";
			}
		if (isset($_POST["habitat"]))
			{
			/*Création de l'en-tête*/
			$param[$i] = "habitat";  $i++;	
			/*Création de la requête de sélection*/
			$select1 = $select1.", habitat";
			$select2 = $select2.", habitat";
			$select3 = $select3.", habitat";
			$select4 = $select4.", 'non prévu dans cette version' as habitat";
			}
		if (isset($_POST["repart"]))
			{
			/*Création de l'en-tête*/
			$param[$i] = "fr";  $i++; $param[$i] = "gf";  $i++; $param[$i] = "mar";  $i++; $param[$i] = "gua";  $i++; $param[$i] = "sm";  $i++; $param[$i] = "sb";  $i++; 	
			$param[$i] = "spm";  $i++; $param[$i] = "may";  $i++; $param[$i] = "epa";  $i++; $param[$i] = "reu";  $i++; $param[$i] = "taaf";  $i++; $param[$i] = "pf";  $i++; 	
			$param[$i] = "nc";  $i++; $param[$i] = "wf";  $i++; $param[$i] = "cli"; 	
			/*Création de la requête de sélection*/
			$select1 = $select1.", fr, gf, mar, gua, sm, sb, spm, may, epa, reu, taaf, pf, nc, wf, cli";
			$select2 = $select2.", fr, gf, mar, gua, sm, sb, spm, may, epa, reu, taaf, pf, nc, wf, cli";
			$select3 = $select3.", fr, gf, mar, gua, smsb as sm, smsb as sb, spm, may, epa, reu, taaf, pf, nc, wf, cli";
			$select4 = $select4.", fr, 'non prévu dans cette version' as gf, mar, gua, smsb as sm, smsb as sb, spm, may, 'non prévu dans cette version' as epa, reu, taaf, 'non prévu dans cette version' as pf, 'non prévu dans cette version' as nc, 'non prévu dans cette version' as wf, 'non prévu dans cette version' as cli";
			}
		if (isset($_POST["url"]))
			{
			/*Création de l'en-tête*/
			$param[$i] = "url"; $i++;
			/*Création de la requête de sélection*/
			$select1 = $select1.", url";
			$select2 = $select2.", 'non prévu dans cette version' as url";
			$select3 = $select3.", 'non prévu dans cette version' as url";
			$select4 = $select4.", 'non prévu dans cette version' as url";
			}
		
		/*TaxRef*/
		if (isset($param[0]))
			{	
			$query = "SELECT * FROM
				(SELECT 'v8' as version, cd_nom $select1 FROM taxrefv80_utf8 v8 WHERE cd_nom = '".$_POST["cd_nom"]."'
				UNION ALL
				SELECT 'v7' as version, cd_nom $select1 FROM taxrefv70_utf8 v7 WHERE cd_nom = '".$_POST["cd_nom"]."'
				UNION ALL
				SELECT 'v6' as version, cd_nom $select1 FROM taxrefv60_utf8 v6	WHERE cd_nom = '".$_POST["cd_nom"]."'
				UNION ALL
				SELECT 'v5' as version, cd_nom $select1 FROM taxrefv50_utf8 v5	WHERE cd_nom = '".$_POST["cd_nom"]."'
				UNION ALL
				SELECT 'v4' as version, cd_nom $select2 FROM taxrefv40_utf8 v4	WHERE cd_nom = '".$_POST["cd_nom"]."'
				UNION ALL
				SELECT 'v3' as version, cd_nom $select3 FROM taxrefv30_utf8 v3	WHERE cd_nom = '".$_POST["cd_nom"]."'
				UNION ALL
				SELECT 'v2' as version, cd_nom $select4 FROM taxrefv20_utf8 v2	WHERE cd_nom = '".$_POST["cd_nom"]."') as analyse_cd_nom
				ORDER BY version ASC";
			$nb_param = count($param);
			$param_total = $nb_param + 2;
			$table = query_bdd($connexion,$query,$param_total);		//$table est un tableau de tableaux. chaque "case correspond à la liste de toutes les valeur d'un attribut
			// echo $query;
			
				if (isset($table))
					{
					if (empty($table)) 
						{
						echo "Aucun taxon n'a été trouvé dans TaxRef avec ce cd_nom<BR>";
						}
					else
						{
						$nb_taxon = count($table[0]);
						
						echo "<h3>Résultat de la requête</h3>";
						echo "<TABLE id = 'prez'><TR><TD>version de TaxRef</TD><TD>cd_nom</TD>";
						For ($j=0; $j<$nb_param; $j++)
							{
							echo "<TD>$param[$j]</TD>";
							}
						echo "</TR>";
						For ($j=0; $j<$nb_taxon; $j++)
							{
							echo "<TR>";
							For ($k=0; $k<$param_total; $k++)
								{
								echo "<TD>".$table[$k][$j]."</TD>";
								}
							echo "</TR>";
							}
						echo "<TABLE>";
						}
					}
						
						
			/*TaxRef Change*/
			$query = "SELECT 'v2-v3' as version, ogc_fid, cd_nom, champ, valeur_init, valeur_final, type_change 
					FROM taxref_changes_30_utf8 WHERE cd_nom = '".$_POST["cd_nom"]."'
						UNION ALL
					SELECT 'v3-v4' as version, ogc_fid, cd_nom, champ, valeur_init, valeur_final, type_change 
					FROM taxref_changes_40_utf8 WHERE cd_nom = '".$_POST["cd_nom"]."'
						UNION ALL
					SELECT 'v4-v5' as version, ogc_fid, cd_nom, champ, valeur_init, valeur_final, type_change 
					FROM taxref_changes_50_utf8 WHERE cd_nom = '".$_POST["cd_nom"]."'
						UNION ALL
					SELECT 'v5-v6' as version, ogc_fid, cd_nom, champ, valeur_init, valeur_final, type_change 
					FROM taxref_changes_60_utf8 WHERE cd_nom = '".$_POST["cd_nom"]."'
						UNION ALL
					SELECT 'v6-v7' as version, ogc_fid, cd_nom, champ, valeur_init, valeur_final, type_change 
					FROM taxref_changes_70_utf8 WHERE cd_nom = '".$_POST["cd_nom"]."'
						UNION ALL
					SELECT 'v7-v8' as version, ogc_fid, cd_nom, champ, valeur_init, valeur_final, type_change 
					FROM taxref_changes_80_utf8 WHERE cd_nom = '".$_POST["cd_nom"]."';";
			$table = query_bdd($connexion,$query,7);		//$table est un tableau de tableaux. chaque "case correspond à la liste de toutes les valeur d'un attribut

			if (isset($table))
				{
				if (empty($table)) 
					{
					echo "Aucun taxon n'a été trouvé dans TaxRef_change avec ce cd nom<BR>";
					}
				else
					{
					$nb_modif = count($table[0]);
					
					if ($nb_modif != 0)
						{
						echo "<h3>Modification dans TaxRef Change</h3>";
						echo "<TABLE id = 'prez'><TR><TD>version de TaxRef</TD><TD>ogc_fid</TD><TD>cd_nom</TD>
						</TD><TD>champ</TD><TD>valeur_init</TD><TD>valeur_final</TD><TD>type_change</TD></TR>";
						for ($j=0; $j<$nb_modif; $j++)
							{
							echo "<TR>";
							For ($k=0; $k<7; $k++)
								{
								echo "<TD>".$table[$k][$j]."</TD>";
								}
							echo "</TR>";
							}
						echo "<TABLE>";
						}
					}
				}
			}
		}