<?php

/* 
 * 
 * Développé par Dylo
 * 
 */

require 'modele/Picture.class.php';

if(isset($_SESSION['idUser']) && isset($_SESSION['pseudo'])){
    
    $myphotos = Picture::getPicturesByUserId($_SESSION['idUser']);
    
    /*echo $_SESSION['idUser'];
    echo '<pre>';
    print_r($myphotos);
    echo '</pre>';
    die();*/
    
    $error_photo_display = "";
    
    if($myphotos != NULL){
        
        $tpl = new raintpl(); //include Rain TPL
        $tpl->assign("photos",$myphotos); // assign an array
        $tpl->assign("erreur",$error_photo_display);
        $tpl->draw("photos"); // draw the template
        
    } else{
        
        $error_photo_display = "T'as rien envoyé pour l'instant ... RAT !!!";
        $tpl = new raintpl(); //include Rain TPL
        $tpl->assign("erreur",$error_photo_display); // assign an array
        $tpl->draw("photos"); // draw the template
        
    }
    
} else{
    
    header('Location: '.INDEX_DIR);
    
}