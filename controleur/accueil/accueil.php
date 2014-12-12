<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!isset($_SESSION['macadress'])){
    include 'controleur/accueil/inscription.php';
}
else{
    //include 'vues/accueil.tpl';
    
    echo 'Hi,'.$_SESSION['pseudo'];
}
