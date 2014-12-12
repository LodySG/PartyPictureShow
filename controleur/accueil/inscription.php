<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Creation d'un identifiant unique
// Exemple : pour validation par mail ... va voir sur internet
//$hash_validation = md5(uniqid(rand(), true));


if(!isset($_SESSION['macadress'])){
    
    $macadresses = NetworkManager::extractMacAdresses();
    
    echo $_SERVER['REMOTE_ADDR'];
    
    $form_user = FormPrecis::userRegisteration($macadress);
    
    echo $form_user;
    
    list($pseudo, $macadress) = $form_user->get_cleaned_data('pseudo', 'macadress');
    
}



