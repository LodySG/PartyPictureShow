<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Participant
 *
 * @author lodydody
 */

require 'lib/ConnectionManager.class.php';

class Participant {
    
    
    public static function insertParticipants($participants){
        
        $sql = "INSERT INTO participants (partyuserid,path,comment) VALUES (". $picture->partyid .",". $picture->userid .",'". $picture->path ."','". $picture->comment ."')";
        $conn = ConnectionManager::getInstance();
        $result = null;
        
        try{
            $result = $conn->exec($sql);
        } catch (Exception $ex) {
            echo "Requete erroné : ".$ex;
        }
        
        return $result;
        
    }
    
    
    public static function getAllParticipantsByPartyId($partyid){
        
        $sql = "SELECT * FROM participants WHERE partyid = ".$partyid;
        $conn = ConnectionManager::getInstance();
        $participants = array();
        
        try {
            $request = $conn->query($sql);
            while($obj = $request->fetch(PDO::FETCH_OBJ)){
                $participants[] = $obj;
            }
            
            $request->closeCursor();
            
        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $participants;
    }
    
    
    public static function getAllParticipantsByUserId($userid){
        
        $sql = "SELECT * FROM participants WHERE userid = ".$userid;
        $conn = ConnectionManager::getInstance();
        $participants = array();
        
        try {
            $request = $conn->query($sql);
            while($obj = $request->fetch(PDO::FETCH_OBJ)){
                $participants[] = $obj;
            }
            
            $request->closeCursor();
            
        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $participants;
        
    }
    
}
