<?php session_start(); 

/**SCRIPT PHP
* 
 *
 *
 * PHP5
 *
 * @firstauthor     
 * @editor     
 * @date  
 * @lastedited   
 * @version   
 *@changelog : 
**/

//librairie utile
require "en_tete.php";
?>
<html>
<?php include "head.html"; 
en_tete("ptf_action");
?>

<div id="main">
	<div id ="titre">
		<!--Suivi de la modification taxref à partir du code nom-->
	</div>
	
<?php
include ("form_action.html");
?>

</div>
<?php
include ("bottom.html");
?>