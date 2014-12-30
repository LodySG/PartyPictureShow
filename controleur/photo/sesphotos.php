<?php

/* 
 * 
 * Développé par Dylo
 * 
 */

require 'modele/Picture.class.php';

if(isset($_SESSION['idUser']) && isset($_SESSION['pseudo'])){
    
    if($otheruser != NULL){
        
        $hisphotos = Picture::getPicturesByUserId($otheruser);

        /*echo $_SESSION['idUser'];
        echo '<pre>';
        print_r($myphotos);
        echo '</pre>';
        die();*/

        if($hisphotos != NULL){

            $tpl = new raintpl(); //include Rain TPL
            $tpl->assign("photos",$hisphotos); // assign an array
            $tpl->draw("photos"); // draw the template

        } else{

            $error_photo_display = "Il a rien envoyé pour l'instant ... ce CAFARD !!!";
            
        }
    }else {
        
        header('Location: '.INDEX_DIR.'?page=accueil&action=panneau');
        
    }
} else{
    
    header('Location: '.INDEX_DIR);
    
}