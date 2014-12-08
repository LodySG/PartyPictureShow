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
    
    function extractMacAdresses(){
        $tab[];
        exec("arp -a",$tab);
        foreach ($tab as $value){
            $value = str_replace("? (","",$value);
            $value = str_replace(") at "," ",$value);
            $value = str_replace(" on en1 ifscope [ethernet]","",$value);
            $value = preg_split("/[\s,]+/",$value);
            $tableau[$value[0]] = $value[1];
        }
        return $tableau;
    }
}
