<?php

/* 
 * 
 * Développé par Dylo
 * 
 */

require 'modele/User.class.php';



if(!isset($_SESSION['pseudo']) && !isset($_SESSION['idUser'])){
    
    $ipAdress = $_SERVER['REMOTE_ADDR'];
    
    // Recuperation de l'adresse mac
    $macadress = NetworkManager::extractMacAdress($ipAdress);
    
    // Verification si cleint existant via l'adresse mac client
    $user = User::getUserByMacAdress($macadress);
    
    // Si client existe, session set up, message succes login
    if ($user != FALSE){
    
        $_SESSION['pseudo'] = $user->pseudo;
        $_SESSION['idUser'] = $user->id;

        //echo 'Hi,'.$_SESSION['pseudo'];
        //include 'vues/accueil.tpl';
        
        //echo $_SESSION['idUser'];
        
        $tpl = new raintpl(); //include Rain TPL
        $tpl->assign("pseudo",$_SESSION['pseudo']); // assign an array
        $tpl->draw("accueil"); // draw the template
    
    }
    
    // Sinon page d'inscription
    else{
        //include 'vues/accueil.tpl';
        include 'controleur/accueil/inscription.php';
    }
    
    // Si le client repasse par l'acceuil, alors qu'il est deja loggé
} else{
    
    //echo 'Hi,'.$_SESSION['pseudo'];
    //include 'vues/accueil.tpl';
    
    $tpl = new raintpl(); //include Rain TPL
    $tpl->assign("pseudo",$_SESSION['pseudo']); // assign an array
    $tpl->draw("accueil"); // draw the template
    
    
}


