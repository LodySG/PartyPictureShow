<?php

/* 
 * 
 * Développé par Dylo
 * 
 */

include_once 'modele/Picture.class.php';

$allphotos = Picture::getAllPictures();

//print_r($allphotos);

if($allphotos!= NULL){
    $tpl = new raintpl(); //include Rain TPL
    $tpl->assign("allphotos",$allphotos); // assign an array
    $tpl->draw("carroussel"); // draw the template
}
