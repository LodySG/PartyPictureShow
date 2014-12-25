<?php

/* 
 * 
 * Développé par Dylo
 * 
 */

// Creation d'un identifiant unique
// Exemple : pour validation par mail ... va voir sur internet
//$hash_validation = md5(uniqid(rand(), true));


if(!isset($_SESSION['idUser']) && !isset($_SESSION['pseudo'])){
    
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
            
            $user = User::getUserByMacAdress($macadress);  
            $_SESSION['pseudo'] = $user->pseudo;
            $_SESSION['idUser'] = $user->id;
            
            Connected::connectUser($_SESSION['idUser']);
            
            User::setLastConectionDateNow($user->macadress);
            
            header('Location: '.INDEX_DIR);
               
        }else{
            
            $erreurs_inscription = "Ca passe pas !!";
            
        }
        
    } else {
        
        // Affichage formulaire
        $tpl = new raintpl();
        $tpl->assign("erreurs",$erreurs_inscription);
        $tpl->assign("form",$form_user);
        $tpl->draw("inscription");
        
    }
    
    
}else {
    
    header('Location: '.INDEX_DIR);
    
}



