<?php

error_reporting(E_ALL);
ini_set('display_errors','On');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Initialisation
include 'global/init.php';

// Début de la tamporisation de sortie
ob_start();

// Si un module est specifié, on regarde s'il existe
if (!empty($_GET['page'])) {

	$page = '/controleur/'.$_GET['page'].'/';
	
	// Si l'action est specifiée, on l'utilise, sinon, on tente une action par défaut
	$action = (!empty($_GET['action'])) ? $_GET['action'].'.php' : 'index.php';
	
	// Si l'action existe, on l'exécute
	if (is_file($page.$action)) {

		include $page.$action;

	// Sinon, on affiche la page d'accueil !
	} else {

		include 'controle/accueil/accueil.php';
	}

// Module non specifié ou invalide ? On affiche la page d'accueil !
} else {

	include 'controleur/accueil/accueil.php';
}

// Fin de la tamporisation de sortie
$contenu = ob_get_clean();

// Début du code HTML
include 'global/haut.php';

echo $contenu;

// Fin du code HTML
include 'global/bas.php';