<?php

/* 
 * 
 * Développé par Dylo
 * 
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
        
            exec("arp -a|grep '".SELF_ADRESS."'\)|cut -f4 -d\" \"",$macadress);
            
        }else{
            
            exec("arp -a|grep '".$ipAdress."'\)|cut -f4 -d\" \"",$macadress);
            
        }
        
        return $macadress[0];
        
    }
}
