<?php
function URL_carte ($input,$cd_ref)
	{
	$qgis_server = "http://www.fcbn.fr/cgi-bin/qgis_mapserv.fcgi?";
	// $qgis_server = "http://localhost/qgis/qgis_mapserv.fcgi.exe?";
	$URL_base = $qgis_server."SERVICE=WMS&VERSION=1.3.0&REQUEST=GetPrint&SRS=EPSG:2154&map0:EXTENT=-265232,6019957,1606706,7137123&FORMAT=jpg&DPI=200";
	
	$theme = array (
		0 => 'test_indigenat',
		1 => 'test_lr',
		2 => 'test_degnat',
		3 => 'test_eee'
		);

	$layer[$theme[0]] = "&LAYER=taxons_indi,test_indigenat,indigenat";
	$layer[$theme[1]] = "&LAYER=taxons_lr,test_lr,LR_regionales";
	$layer[$theme[2]] = "&LAYER=taxons_degnat,test_degnat,degre_naturalisation";
	$layer[$theme[3]] = "&LAYER=taxons_eee,test_eee,statut_eee";
	
	foreach($theme as $value)
		{
		/*Modification du fichier QGIS en fonction du taxon*/
		$file = file_get_contents("$input/$value.qgs");
		$texte = str_replace("100024",$cd_ref,$file);
		file_put_contents("$input/$value.out.qgs",$texte);
		
		/*Création de l'URL du webservice*/
		$map['normal'] = "&map=$input/$value.out.qgs&TEMPLATE=carto";
		$map['thumb'] = "&map=$input/$value.out.qgs&TEMPLATE=carto_thumb";

		$URL[$value]['normal'] = $URL_base.$map['normal'].$layer[$value];
		$URL[$value]['thumb'] = $URL_base.$map['thumb'].$layer[$value];
		}
	
	return $URL;
	}
?>