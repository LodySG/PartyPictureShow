<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of NetworkManager
 *
 * @author lodydody
 */
class NetworkManager {
    
    public static function extractMacAdress($ipAdress){
        
        $macadress = "";
        
        if($ipAdress == LOCALHOST){
            exec("/usr/sbin/arp -a|grep ".SELF_ADRESS."\)|cut -f4 -d\" \"",$macadress);
        }else{
            exec("/usr/sbin/arp -a|grep ".$ipAdress."\)|cut -f4 -d\" \"",$macadress);
        }
            
        return $macadress[0];
        
    }
}
