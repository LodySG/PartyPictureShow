<?php

//error_reporting(E_ALL);
//ini_set('display_errors','On');

/* 
 * 
 * Développé par Dylo
 * 
 */

// Initialisation
include 'global/init.php';

require_once 'modele/Connected.class.php';


// Début de la tamporisation de sortie
ob_start();

// Si un module est specifié, on regarde s'il existe
if (!empty($_GET['page']) && isset($_SESSION['pseudo']) && isset($_SESSION['idUser'])) {
       
    $page = 'controleur/'.$_GET['page'].'/';
    
    // Si l'action est specifiée, on l'utilise, sinon, on tente une action par défaut
    $action = (!empty($_GET['action'])) ? $_GET['action'].'.php' : 'index.php';

    // Si l'action existe, on l'exécute
    if (is_file($page.$action)) {
            
            Connected::connectUser($_SESSION['idUser']);
            
            if(isset($_GET['otheruser'])){
                
                $otheruser = $_GET['otheruser'];
                
                include $page.$action;
            
            }else {
                
                include $page.$action;
            }

    // Sinon, on affiche la page d'accueil !
    } else {

            include 'controleur/accueil/accueil.php';
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
