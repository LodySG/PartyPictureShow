<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Redimensionnement et sauvegarde de l'avatar
$avatar = new Image($avatar);
$avatar->resize_to(100, 100); // Image->resize_to($largeur_maxi, $hauteur_maxi)
$avatar_filename = 'images/imageshow/'.$id_utilisateur .'.'.strtolower(pathinfo($avatar->get_filename(), PATHINFO_EXTENSION));
$avatar->save_as($avatar_filename);
