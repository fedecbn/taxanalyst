<?php
$i = 0;
$p = 0;
$q = 0;
$param[$i] = "CBN(s)"; $i++; 
$param[$i] = "territoire(s)"; $i++;	
$param[$i] = "indigenat(s)"; $i++;	
$param[$i] = "degré(s) de naturalisation"; $i++; 
$param[$i] = "menace(s) liste rouge"; $i++; 
$param[$i] = "critère(s) d'évaluation LR"; $i++; 
$param[$i] = "liste EEE"; $i++;	
$param[$i] = "Indice(s) de rareté"; $i++; 
$param[$i] = "Deficit(s) d'observation"; $i++;	

$param2[$p] = "rang(s) CBN"; $p++;	
$param2[$p] = "hybride?"; $p++; 
$param2[$p] = "règne(s) CBN"; $p++; 
$param2[$p] = "famille(s) CBN"; $p++; 
$param2[$p] = "ordre(s) CBN"; $p++;	
$param2[$p] = "classe(s) CBN"; $p++; 
$param2[$p] = "phylum(s) CBN"; $p++;

$param3[$q] = "CBN(s)"; $q++;	
$param3[$q] = "territoire(s)"; $q++;	
$param3[$q] = "présence en banque"; $q++;	
$param3[$q] = "présence de test de germination"; $q++;	



function tableau($connexion,$select,$param,$titre,$vide)
	{
	$nb_param = count($param);
	$table = query_bdd($connexion,$select,$nb_param);		//$table est un tableau de tableaux. chaque "case correspond à la liste de toutes les valeur d'un attribut
	// var_dump($table);
	if (isset($table))
		{
		if (empty($table)) 
			{
			$vide = $vide + 1;
			}
		else
			{
			$nb_taxon = count($table[0]);
			
			echo "<h3>$titre</h3>";
			echo "<TABLE id = 'prez'><TR>";
			For ($j=0; $j<$nb_param; $j++)
				{
				echo "<TD><b>$param[$j]</b></TD>";
				}
			echo "</TR>";
			For ($j=0; $j<$nb_taxon; $j++)
				{
				echo "<TR>";
				For ($k=0; $k<$nb_param; $k++)
					{
					echo "<TD>".$table[$k][$j]."</TD>";
					}
				echo "</TR>";
				}
			echo "<TABLE>";
			}
		}

	
	return $vide;
	}

	
	
	
function requete($nom_taxon)
	{
	$query_cd_ref = "SELECT DISTINCT cd_nom_referentiel
			FROM taxa.referentiel_taxo rt
			WHERE nom_complet_taxon_referentiel = '$nom_taxon'";
		
	$query_nom = "SELECT DISTINCT
			trim(trailing ' ' from nom_valide_taxon_mere) as \"nom taxon CBN\"
		FROM taxa.referentiel_taxo rt 
		 JOIN taxa.coor_taxon_reftaxo ctr ON rt.id_rattachement_referentiel = ctr.id_rattachement_referentiel 
		 JOIN taxa.taxon_taxa tt ON tt.id_taxa_fcbn = ctr.id_taxa_fcbn 
		WHERE cd_nom_referentiel = (
			SELECT DISTINCT cd_nom_referentiel
			FROM taxa.referentiel_taxo rt
			WHERE nom_complet_taxon_referentiel = '$nom_taxon')";

	$query_nom_verna = "SELECT string_agg(\"nom vernaculaire\", '<BR>')
			FROM
			(
			SELECT DISTINCT trim(unnest(string_to_array(string_agg(DISTINCT nom_vernaculaire,','), ','))) as \"nom vernaculaire\"
					FROM taxa.referentiel_taxo rt 
					 JOIN taxa.coor_taxon_reftaxo ctr ON rt.id_rattachement_referentiel = ctr.id_rattachement_referentiel 
					 JOIN taxa.taxon_taxa tt ON tt.id_taxa_fcbn = ctr.id_taxa_fcbn 
					 JOIN taxa.taxon_noms_vernaculaires tnv ON tt.id_taxa_fcbn = tnv.id_taxa_source 
					WHERE cd_nom_referentiel = (
						SELECT DISTINCT cd_nom_referentiel
						FROM taxa.referentiel_taxo rt 
						WHERE nom_complet_taxon_referentiel = '$nom_taxon')
					ORDER BY \"nom vernaculaire\"
			) as one";

	$query_classification = "SELECT  trim(string_agg(DISTINCT code_rang_taxon_mere, ' ')) as rang, 
			trim(string_agg(DISTINCT CASE WHEN hybride_taxon_mere THEN 'OUI' ELSE '' END, ' '))  as \"Hybride ?\"  ,
			trim(string_agg(DISTINCT regne_taxon_mere, ' ')) as regne,
			trim(string_agg(DISTINCT famille_taxon_mere, ' ')) as famille,
			trim(string_agg(DISTINCT ordre_taxon_mere, ' ')) as ordre,
			trim(string_agg(DISTINCT classe_taxon_mere, ' ')) as classe,
			trim(string_agg(DISTINCT phylum_taxon_mere, ' ')) as phylum
		FROM taxa.classification c
		JOIN taxa.taxon_taxa tt ON tt.id_taxa_fcbn = c.id_taxa_fcbn_taxon_taxa 
		JOIN taxa.coor_taxon_reftaxo ctr ON ctr.id_taxa_fcbn = tt.id_taxa_fcbn
		JOIN taxa.referentiel_taxo rt ON rt.id_rattachement_referentiel = ctr.id_rattachement_referentiel
		WHERE cd_nom_referentiel = (
			SELECT DISTINCT cd_nom_referentiel
			FROM taxa.referentiel_taxo rt 
			WHERE nom_complet_taxon_referentiel = '$nom_taxon')
		GROUP BY cd_nom_referentiel";
	
	return array($query_cd_ref,$query_nom,$query_nom_verna,$query_classification);
	}


function requete_territoire($territoire,$nom_taxon)
	{
	$select = "SELECT \"CBN(s)\", \"territoire\",\"indigenat\", \"degré de naturalisation\", \"menace liste rouge\", \"critère d'évaluation LR\", \"liste EEE\", \"Indice de rareté\",\"Deficit d'observation\"
			FROM (SELECT DISTINCT
			string_agg(DISTINCT lct.libelle_collaborateur_source_taxa, ',') as \"CBN(s)\",
			tt.id_taxa_fcbn,
			s.id_territoire,
			libelle_territoire||'('||code_territoire||')' as \"territoire\"			
			FROM taxa.referentiel_taxo rt 
			 JOIN taxa.coor_taxon_reftaxo ctr ON rt.id_rattachement_referentiel = ctr.id_rattachement_referentiel 
			 JOIN taxa.taxon_taxa tt ON tt.id_taxa_fcbn = ctr.id_taxa_fcbn 
			 JOIN taxa.statuts s ON tt.id_taxa_fcbn = s.id_taxa_fcbn 
			 JOIN taxa.liste_statuts ls ON ls.id_statut = s.id_statut
			 JOIN taxa.liste_geo lg ON lg.id_territoire = s.id_territoire
			 JOIN taxa.source_taxa st ON st.code_source_taxa = tt.code_source_taxa
			 JOIN taxa.coor_source_collaborateur csc ON csc.source_taxa = st.code_source_taxa
			 JOIN taxa.liste_collaborateur_taxa lct ON csc.id_collaborateur_source_taxa = lct.code_collaborateur_source_taxa
			WHERE cd_nom_referentiel = (
				SELECT DISTINCT cd_nom_referentiel
				FROM taxa.referentiel_taxo rt 
				WHERE nom_complet_taxon_referentiel = '$nom_taxon') AND code_type_territoire = '$territoire'
				GROUP BY tt.id_taxa_fcbn, s.id_territoire,\"territoire\"
			) as one
			LEFT OUTER JOIN
			(
			SELECT DISTINCT 
			tt.id_taxa_fcbn, s.id_territoire, code_territoire, code_type_territoire, libelle_statut as \"indigenat\"
			FROM taxa.referentiel_taxo rt 
			 JOIN taxa.coor_taxon_reftaxo ctr ON rt.id_rattachement_referentiel = ctr.id_rattachement_referentiel 
			 JOIN taxa.taxon_taxa tt ON tt.id_taxa_fcbn = ctr.id_taxa_fcbn 
			 JOIN taxa.statuts s ON tt.id_taxa_fcbn = s.id_taxa_fcbn 
			 JOIN taxa.liste_statuts ls ON ls.id_statut = s.id_statut
			 JOIN taxa.liste_geo lg ON lg.id_territoire = s.id_territoire 
			WHERE cd_nom_referentiel = (
				SELECT DISTINCT cd_nom_referentiel
				FROM taxa.referentiel_taxo rt 
				WHERE nom_complet_taxon_referentiel = '$nom_taxon') AND type_statut = 'INDI'
			) as two
			ON one.id_taxa_fcbn = two.id_taxa_fcbn AND one.id_territoire = two.id_territoire
			LEFT OUTER JOIN
			(
			SELECT DISTINCT 
			tt.id_taxa_fcbn, s.id_territoire, code_territoire, code_type_territoire, libelle_statut as \"degré de naturalisation\"
			FROM taxa.referentiel_taxo rt 
			 JOIN taxa.coor_taxon_reftaxo ctr ON rt.id_rattachement_referentiel = ctr.id_rattachement_referentiel 
			 JOIN taxa.taxon_taxa tt ON tt.id_taxa_fcbn = ctr.id_taxa_fcbn 
			 JOIN taxa.statuts s ON tt.id_taxa_fcbn = s.id_taxa_fcbn 
			 JOIN taxa.liste_statuts ls ON ls.id_statut = s.id_statut
			 JOIN taxa.liste_geo lg ON lg.id_territoire = s.id_territoire 
			WHERE cd_nom_referentiel = (
				SELECT DISTINCT cd_nom_referentiel
				FROM taxa.referentiel_taxo rt 
				WHERE nom_complet_taxon_referentiel = '$nom_taxon') AND type_statut = 'DEGNAT'
			) as three
			ON one.id_taxa_fcbn = three.id_taxa_fcbn AND one.id_territoire = three.id_territoire
			LEFT OUTER JOIN
			(
			SELECT DISTINCT 
			tt.id_taxa_fcbn, s.id_territoire, code_territoire, code_type_territoire, code_statut as \"menace liste rouge\", critere_statut as \"critère d'évaluation LR\"
			FROM taxa.referentiel_taxo rt 
			 JOIN taxa.coor_taxon_reftaxo ctr ON rt.id_rattachement_referentiel = ctr.id_rattachement_referentiel 
			 JOIN taxa.taxon_taxa tt ON tt.id_taxa_fcbn = ctr.id_taxa_fcbn 
			 JOIN taxa.statuts s ON tt.id_taxa_fcbn = s.id_taxa_fcbn 
			 JOIN taxa.liste_statuts ls ON ls.id_statut = s.id_statut
			 JOIN taxa.liste_geo lg ON lg.id_territoire = s.id_territoire 
			WHERE cd_nom_referentiel = (
				SELECT DISTINCT cd_nom_referentiel
				FROM taxa.referentiel_taxo rt 
				WHERE nom_complet_taxon_referentiel = '$nom_taxon') AND type_statut = 'LR'
			) as four
			ON one.id_taxa_fcbn = four.id_taxa_fcbn AND one.id_territoire = four.id_territoire
			LEFT OUTER JOIN
			(
			SELECT DISTINCT 
			tt.id_taxa_fcbn, s.id_territoire, code_territoire, code_type_territoire, libelle_statut as \"liste EEE\"
			FROM taxa.referentiel_taxo rt
			 JOIN taxa.coor_taxon_reftaxo ctr ON rt.id_rattachement_referentiel = ctr.id_rattachement_referentiel 
			 JOIN taxa.taxon_taxa tt ON tt.id_taxa_fcbn = ctr.id_taxa_fcbn 
			 JOIN taxa.statuts s ON tt.id_taxa_fcbn = s.id_taxa_fcbn 
			 JOIN taxa.liste_statuts ls ON ls.id_statut = s.id_statut
			 JOIN taxa.liste_geo lg ON lg.id_territoire = s.id_territoire 
			WHERE cd_nom_referentiel = (
				SELECT DISTINCT cd_nom_referentiel
				FROM taxa.referentiel_taxo rt 
				WHERE nom_complet_taxon_referentiel = '$nom_taxon') AND type_statut = 'LEEE'
			) as five
			ON one.id_taxa_fcbn = five.id_taxa_fcbn AND one.id_territoire = five.id_territoire
			LEFT OUTER JOIN
			(
			SELECT DISTINCT 
			tt.id_taxa_fcbn, s.id_territoire, code_territoire, code_type_territoire, libelle_statut as \"Indice de rareté\"
			FROM taxa.referentiel_taxo rt
			 JOIN taxa.coor_taxon_reftaxo ctr ON rt.id_rattachement_referentiel = ctr.id_rattachement_referentiel 
			 JOIN taxa.taxon_taxa tt ON tt.id_taxa_fcbn = ctr.id_taxa_fcbn 
			 JOIN taxa.statuts s ON tt.id_taxa_fcbn = s.id_taxa_fcbn 
			 JOIN taxa.liste_statuts ls ON ls.id_statut = s.id_statut
			 JOIN taxa.liste_geo lg ON lg.id_territoire = s.id_territoire 
			WHERE cd_nom_referentiel = (
				SELECT DISTINCT cd_nom_referentiel
				FROM taxa.referentiel_taxo rt 
				WHERE nom_complet_taxon_referentiel = '$nom_taxon') AND type_statut = 'RAR'
			) as six
			ON one.id_taxa_fcbn = six.id_taxa_fcbn AND one.id_territoire = six.id_territoire
			LEFT OUTER JOIN
			(
			SELECT DISTINCT 
			tt.id_taxa_fcbn, s.id_territoire, code_territoire, code_type_territoire, libelle_statut as \"Deficit d'observation\"
			FROM taxa.referentiel_taxo rt
			 JOIN taxa.coor_taxon_reftaxo ctr ON rt.id_rattachement_referentiel = ctr.id_rattachement_referentiel 
			 JOIN taxa.taxon_taxa tt ON tt.id_taxa_fcbn = ctr.id_taxa_fcbn 
			 JOIN taxa.statuts s ON tt.id_taxa_fcbn = s.id_taxa_fcbn 
			 JOIN taxa.liste_statuts ls ON ls.id_statut = s.id_statut
			 JOIN taxa.liste_geo lg ON lg.id_territoire = s.id_territoire 
			WHERE cd_nom_referentiel = (
				SELECT DISTINCT cd_nom_referentiel
				FROM taxa.referentiel_taxo rt 
				WHERE nom_complet_taxon_referentiel = '$nom_taxon') AND type_statut = 'DEF_OBS'
			) as seven
			ON one.id_taxa_fcbn = seven.id_taxa_fcbn AND one.id_territoire = seven.id_territoire
			GROUP BY \"CBN(s)\", \"territoire\", \"indigenat\", \"degré de naturalisation\", \"menace liste rouge\", \"critère d'évaluation LR\", \"liste EEE\", \"Indice de rareté\",\"Deficit d'observation\", one.id_taxa_fcbn
			ORDER BY \"territoire\" ASC";
			
	return $select;
	}
	
	function requete_territoire_ces($territoire,$nom_taxon)
	{
	$select = "SELECT \"CBN(s)\", \"territoire\",\"présence en banque\", \"présence test germination\"
			FROM (SELECT DISTINCT
			string_agg(DISTINCT lct.libelle_collaborateur_source_taxa, ',') as \"CBN(s)\",
			tt.id_taxa_fcbn,
			s.id_territoire,
			libelle_territoire||'('||code_territoire||')' as \"territoire\"			
			FROM taxa.referentiel_taxo rt 
			 JOIN taxa.coor_taxon_reftaxo ctr ON rt.id_rattachement_referentiel = ctr.id_rattachement_referentiel 
			 JOIN taxa.taxon_taxa tt ON tt.id_taxa_fcbn = ctr.id_taxa_fcbn 
			 JOIN taxa.statuts s ON tt.id_taxa_fcbn = s.id_taxa_fcbn 
			 JOIN taxa.liste_statuts ls ON ls.id_statut = s.id_statut
			 JOIN taxa.liste_geo lg ON lg.id_territoire = s.id_territoire
			 JOIN taxa.source_taxa st ON st.code_source_taxa = tt.code_source_taxa
			 JOIN taxa.coor_source_collaborateur csc ON csc.source_taxa = st.code_source_taxa
			 JOIN taxa.liste_collaborateur_taxa lct ON csc.id_collaborateur_source_taxa = lct.code_collaborateur_source_taxa
			WHERE cd_nom_referentiel = (
				SELECT DISTINCT cd_nom_referentiel
				FROM taxa.referentiel_taxo rt 
				WHERE nom_complet_taxon_referentiel = '$nom_taxon') AND code_type_territoire = '$territoire'
				GROUP BY tt.id_taxa_fcbn, s.id_territoire,\"territoire\"
			) as one
			LEFT OUTER JOIN
			(
			SELECT DISTINCT 
			tt.id_taxa_fcbn, s.id_territoire, code_territoire, code_type_territoire, libelle_statut as \"présence en banque\"
			FROM taxa.referentiel_taxo rt 
			 JOIN taxa.coor_taxon_reftaxo ctr ON rt.id_rattachement_referentiel = ctr.id_rattachement_referentiel 
			 JOIN taxa.taxon_taxa tt ON tt.id_taxa_fcbn = ctr.id_taxa_fcbn 
			 JOIN taxa.statuts s ON tt.id_taxa_fcbn = s.id_taxa_fcbn 
			 JOIN taxa.liste_statuts ls ON ls.id_statut = s.id_statut
			 JOIN taxa.liste_geo lg ON lg.id_territoire = s.id_territoire 
			WHERE cd_nom_referentiel = (
				SELECT DISTINCT cd_nom_referentiel
				FROM taxa.referentiel_taxo rt 
				WHERE nom_complet_taxon_referentiel = '$nom_taxon') AND type_statut = 'PRES_BANQ'
			) as two
			ON one.id_taxa_fcbn = two.id_taxa_fcbn AND one.id_territoire = two.id_territoire
			LEFT OUTER JOIN
			(
			SELECT DISTINCT 
			tt.id_taxa_fcbn, s.id_territoire, code_territoire, code_type_territoire, libelle_statut as \"présence test germination\"
			FROM taxa.referentiel_taxo rt 
			 JOIN taxa.coor_taxon_reftaxo ctr ON rt.id_rattachement_referentiel = ctr.id_rattachement_referentiel 
			 JOIN taxa.taxon_taxa tt ON tt.id_taxa_fcbn = ctr.id_taxa_fcbn 
			 JOIN taxa.statuts s ON tt.id_taxa_fcbn = s.id_taxa_fcbn 
			 JOIN taxa.liste_statuts ls ON ls.id_statut = s.id_statut
			 JOIN taxa.liste_geo lg ON lg.id_territoire = s.id_territoire 
			WHERE cd_nom_referentiel = (
				SELECT DISTINCT cd_nom_referentiel
				FROM taxa.referentiel_taxo rt 
				WHERE nom_complet_taxon_referentiel = '$nom_taxon') AND type_statut = 'PRES_TEST_GERM'
			) as three
			ON one.id_taxa_fcbn = three.id_taxa_fcbn AND one.id_territoire = three.id_territoire";
			
			return $select;
			
	}
	
	?>
