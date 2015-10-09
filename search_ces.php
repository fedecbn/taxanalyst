<?php
	ob_start();
	/*chemin du fichier*/
	// $file = 'data/liste_taxon.txt';
	$file = 'data/taxons_ces.txt';
	
	/*Lecture du fichier*/
    $data = file($file); 
    // $handle = fopen($file,'r');
	
	/*construction de la table*/
	// $j = 0;
	// while (!feof($handle)) 
		// {
		// $data = fgets($handle);
		// $decoupe = explode(';',$data);
		// $esp[$j] = $decoupe[0];
		// $gras[$j] = substr($decoupe[1],0,3);
		// $j++;
		// }
		
    $dataLen = count($data);
    // $dataLen = count($esp);

    sort($data); // On trie les villes dans l'ordre alphabétique
    // sort($esp); // On trie les villes dans l'ordre alphabétique

    $results = array(); // Le tableau où seront stockés les résultats de la recherche
	
    // La boucle ci-dessous parcourt tout le tableau $data, jusqu'à un maximum de 10 résultats

        for ($i = 0 ; $i < $dataLen && count($results) < 10 ; $i++) {
			if (stripos($data[$i], $_GET['s']) === 0) // Si la valeur commence par les mêmes caractères que la recherche
				{
				array_push($results, $data[$i]); // On ajoute alors le résultat à la liste à retourner
				}
        }
		
		
        // for ($i = 0 ; $i < $dataLen && count($results) < 10 ; $i++) {
			// if (stripos($esp[$i], $_GET['s']) === 0) // Si la valeur commence par les mêmes caractères que la recherche
				// { 
				// if ($gras[$i] == 'oui')
					// {
					// array_push($results, '<B>'.$esp[$i].'</B>'); // On ajoute alors le résultat à la liste à retourner
					// }
				// else
					// {
					// array_push($results, $esp[$i]); // On ajoute alors le résultat à la liste à retourner
					// }
				// }
        // }
	
    echo implode('|', $results); // Et on affiche les résultats séparés par une barre verticale |
?>
