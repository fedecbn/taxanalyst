<?php session_start(); ?>

<?php
/**SCRIPT PHP
* interface de production de carte (formulaire html pour passer les paramètres souhaités).
 *
 *
 * PHP5
 *
 * @firstauthor     Thomas Milon <thomas.milon@teledetection.fr>
 * @editor     Mathieu Kazmierski <mathieu.kazmierski@teledetection.fr>
 * @date  02/08/11
 * @lastedited    02/08/11
 * @version    0.3
 *@changelog : 
**/

//librairie utile
require "include/en_tete.php";
?>

<html>
	<?php include "html/head.html"; ?>
	<body>
		<?php 
		en_tete("ptf_accueil");
		?>

		<div id="main">
			<div id ="titre">
				Tableau de bord
			</div>			
		<?php
		include ("html/form_accueil.html");
		?>
		</div>

<?php
include ("html/bottom.html");
?>