<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Creation d'un identifiant unique
// Exemple : pour validation par mail ... va voir sur internet
//$hash_validation = md5(uniqid(rand(), true));


list($pseudo, $macadress) = $formUser->get_cleaned_data('pseudo', 'macadress');


