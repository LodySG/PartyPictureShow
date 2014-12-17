<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Creation d'un identifiant unique
// Exemple : pour validation par mail ... va voir sur internet
//$hash_validation = md5(uniqid(rand(), true));


if(!isset($_SESSION['macadress']) && !isset($_SESSION['pseudo'])){
    
    $macadress = NetworkManager::extractMacAdress($ipAdress);
    
    $form_user = FormPrecis::userRegisteration($macadress);
    
    // Pré-remplissage avec les valeurs précédente
    $form_user->bound($_POST);
    
    
    $erreurs_inscription = "";
    
    if ($form_user->is_valid($_POST)) {
	
        $pseudo = $form_user->get_cleaned_data('pseudo');
        
        $user_noovo = new stdClass();
        
        $user_noovo->pseudo = $pseudo;
        $user_noovo->macadress = $macadress;
        
        $reponse = User::insertUser($user_noovo);
        
        if($reponse == 1){
            
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['macadress'] = $macadress;
            
            header('Location: '.INDEX_FILE);
               
        }else{
            
            $erreurs_inscription = "Ca passe pas !!";
            
        }
        
    } else {
        
        // Affichage formulaire
        echo $erreurs_inscription;
        echo $form_user;
        
    }
    
    
}else {
    
    header('Location: '.INDEX_FILE);
    
}



