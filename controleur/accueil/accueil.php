<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'modele/User.class.php';

$ipAdress = $_SERVER['REMOTE_ADDR'];

$macadress = NetworkManager::extractMacAdress($ipAdress);

$user = User::getUserByMacAdress($macadress);



if ($user != FALSE){
    
    print_r($user);
    
    echo 'Hi,'.$_SESSION['pseudo'];
    
}
else{
    //include 'vues/accueil.tpl';
    
    $_SESSION['macadress'] = $macadress;
    
    include 'controleur/accueil/inscription.php';
}
