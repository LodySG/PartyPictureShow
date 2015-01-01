<?php

/* 
 * 
 * Développé par Dylo
 * 
 */

require 'modele/Picture.class.php';

if(isset($_SESSION['idUser']) && isset($_SESSION['pseudo'])){
    
    
    
    
    $erreur_image = "";
    
    // Redimensionnement et sauvegarde de l'avatar
    /*$avatar = new Image($avatar);
    $avatar->resize_to(100, 100); // Image->resize_to($largeur_maxi, $hauteur_maxi)
    $avatar_filename = 'images/imageshow/'.$id_utilisateur .'.'.strtolower(pathinfo($avatar->get_filename(), PATHINFO_EXTENSION));
    $avatar->save_as($avatar_filename);*/

    if (isset($_FILES["photo"])) {
        
        $check = getimagesize($_FILES['photo']['tmp_name']);
        
        if($check){
            
            if($_FILES['photo']['size'] < MAX_SIZE_PICS){
            
                // Recuperation du parametre 'photo'
                $photo = $_FILES['photo']['tmp_name'];

                //extration de l'extension
                $ext = pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION);

                $photo = new Image($photo);

                // Construction du chemin image
                $photo_filename = "images/showroom/".$_SESSION['idUser']."_".date("Ymd_His").".".$ext;

                //echo $photo_filename;

                // Sauvegarde du fichier photo avec le nom photo_filename
                $photo->save_as($photo_filename);

                //construction de l'objet picture
                $picture = new stdClass();
                $picture->partyid = 1;
                $picture->userid = $_SESSION['idUser'];
                $picture->path = $photo_filename;
                $picture->comment = " ";


                // Sauvegarde du chemin dans la base de donnees
                $reponse = Picture::insertPicture($picture);


                if($reponse == 1){

                    $tpl_success = new RainTPL();
                    $tpl_success->draw('successReceive');

                }else{

                    $erreur_image = "la photo n'a pas pu être enregistrer";

                }
                
            }else {
                
                $erreur_image = "Ta tof est trop épaisse ...";
                
            }
            
        }else {
         
            $erreur_image = "C'est pas une photo ton truc la !!!";
         
        }
        
        if($erreur_image != ""){
            $tpl = new raintpl();
            $tpl->assign("erreurs",$erreur_image);
            //$tpl->assign("form",$form_image);
            $tpl->draw("envoi");
        }
        
    }else {
        
        // Affichage formulaire
        $tpl = new raintpl();
        $tpl->assign("erreurs",$erreur_image);
        //$tpl->assign("form",$form_image);
        $tpl->draw("envoi");

    }
    
}else {
    
    header('Location: '.INDEX_DIR);
    
}