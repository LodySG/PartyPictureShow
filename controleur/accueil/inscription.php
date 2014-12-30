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
    
    $erreurs_inscription = "";
    
    if(isset($_POST['pseudo'])){
	
        if($_POST['pseudo'] != ""){
            
            $_POST['pseudo'] = filter_var($_POST['pseudo'], FILTER_SANITIZE_STRING);
            
            if($_POST['pseudo'] == ""){
                $erreurs_inscription = "C'est quoi ca ? ... un vrai pseudo please !";
            }
            
        }else {
            
            $erreurs_inscription = "Pffff !!! ... cris ton pseudo dans la case avant ! CAFARD !!!";
            
        }
        
        if($erreurs_inscription == ""){
            
            $user_noovo = new stdClass();

            $user_noovo->pseudo = $_POST['pseudo'];
            $user_noovo->macadress = $_POST['macadress'];

            $reponse = User::insertUser($user_noovo);



            if($reponse == 1){

                $user = User::getUserByMacAdress($macadress);  
                $_SESSION['pseudo'] = $user->pseudo;
                $_SESSION['idUser'] = $user->id;

                Connected::connectUser($_SESSION['idUser']);

                User::setLastConnectionDateNow($user->macadress);

                header('Location: '.INDEX_DIR);

            }else{

                $erreurs_inscription = "Ca passe pas !!";

            }
        }    
        
    } else {
        
        // Affichage formulaire
        $tpl = new raintpl();
        $tpl->assign("erreurs",$erreurs_inscription);
        $tpl->assign("macadress",$macadress);
        $tpl->draw("inscription");
        
    }
    
    
}else {
    
    header('Location: '.INDEX_DIR);
    
}



