<?php

function query_bdd($connexion,$query,$nb_attribut)
{
$dbconn= pg_connect($connexion);
$resultat = pg_query($query);
$flag = 0;


if 	($nb_attribut == 0)
    {
    // echo "Aucune réponse à apporter";
    }
elseif ($nb_attribut == 1)
    {
	while ($ligne = pg_fetch_row($resultat))
		{
		$table[$flag] = $ligne[0];
		$flag = $flag + 1;
		}
    }
else
    {
	while ($ligne = pg_fetch_row($resultat))
        {
        for ($i=0 ; $i<=$nb_attribut-1 ; $i++)
            {
            $table[$i][$flag] = $ligne[$i];
            }
		$flag = $flag + 1;
        }
    }

if(!isset($table))
	{
	$table = array();
	}

pg_close($dbconn);
	
return $table;

}
