<?php

/* 
 * 
 * Développé par Dylo
 * 
 */

require_once 'modele/Connected.class.php';

require_once 'modele/User.class.php';

if(isset($_SESSION['idUser']) && isset($_SESSION['pseudo'])){
    
    $users_connected = Connected::getAllConnected();
    
    foreach($users_connected as $user){
        
        $userslist[]=$user;
           
    }
    
    $usersobjonline = array();
    
    foreach($userslist as $user){
        //if($user->iduser != $_SESSION['idUser']){
            $userobj = User::getUserById($user->iduser);
            $usersobjonline[]=$userobj;
        //}
    }
    
    //print_r($usersobjonline);
    
    $tpl = new raintpl(); //include Rain TPL
    $tpl->assign("usersonline",$usersobjonline); // assign an array
    $tpl->draw("connectes"); // draw the template
    
    
    
    
    
}else {
    
    header('Location: '.INDEX_DIR);
}