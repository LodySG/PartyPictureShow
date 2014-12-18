<?php

/* 
 * 
 * Développé par Dylo
 * 
 */

require 'modele/User.class.php';



if(!isset($_SESSION['pseudo']) && !isset($_SESSION['macadress'])){
    
    $ipAdress = $_SERVER['REMOTE_ADDR'];
    
    $macadress = NetworkManager::extractMacAdress($ipAdress);
    
    $user = User::getUserByMacAdress($macadress);
    
    if ($user != FALSE){
    
        $_SESSION['pseudo'] = $user->pseudo;
        $_SESSION['macadress'] = $user->macadress;

        //echo 'Hi,'.$_SESSION['pseudo'];
        //include 'vues/accueil.tpl';
        
        $tpl = new raintpl(); //include Rain TPL
        $tpl->assign("pseudo",$_SESSION['pseudo']); // assign an array
        $tpl->draw("accueil"); // draw the template
    
    }
    else{
        //include 'vues/accueil.tpl';
        include 'controleur/accueil/inscription.php';
    }
    
} else{
    
    //echo 'Hi,'.$_SESSION['pseudo'];
    //include 'vues/accueil.tpl';
    
    $tpl = new raintpl(); //include Rain TPL
    $tpl->assign("pseudo",$_SESSION['pseudo']); // assign an array
    $tpl->draw("accueil"); // draw the template
    
    
}


