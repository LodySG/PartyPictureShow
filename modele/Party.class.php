<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'ConnectionManager.class.php';

class Party 
{
    
    public static function insertParty($party){
        
        $sql = "INSERT INTO parties (name) VALUES ('". $picture->name ."')";
        $conn = ConnectionManager::getInstance();
        $result = null;
        
        try{
            $result = $conn->exec($sql);
        } catch (PDOException $ex) {
            echo "Requete erroné : ".$ex;
        }
        
        return $result;
        
    }
    
    
    public static function deletePartyByID($id){
        
        $sql = "DELETE FROM parties WHERE id = ". $id;
        $conn = ConnectionManager::getInstance();
        $result = null;
        
        try{
            $result = $conn->exec($sql);
        } catch (PDOException $ex) {
            echo "Requete erroné : ".$ex;
        }
        
        return $result;
        
    }
    
    
    public static function getPartyById($id){
        
        $sql = "SELECT * FROM parties WHERE id=".$id;
        $conn = ConnectionManager::getInstance();
        $party = NULL;
        
        try {
            
            $request = $conn->query($sql);
            $obj = $request->fetch(PDO::FETCH_OBJ);
            $party = $obj;
            $request->closeCursor();
            
        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $party;
        
    }
    
    public static function getAllParties(){
        
        $sql = "SELECT * FROM pictures";
        $conn = ConnectionManager::getInstance();
        $parties = array();
        
        try {
            $request = $conn->query($sql);
            while($obj = $request->fetch(PDO::FETCH_OBJ)){
                $parties[] = $obj;
            }
            
            $request->closeCursor();
            
        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $parties;
        
    }
    
    
    public static function getCurrentParty(){
        
        $sql = "SELECT * FROM parties WHERE NOW() > startdaytime AND NOW() < enddaytime";
        $conn = ConnectionManager::getInstance();
        $party = NULL;
        
        try {
            
            $request = $conn->query($sql);
            $obj = $request->fetch(PDO::FETCH_OBJ);
            $party = $obj;
            $request->closeCursor();
            
        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $party;
    }
    
    
    public static function updatePartyName($party){
        
        $sql = "UPDATE parties SET name='". $party->name ."' WHERE id=". $party->id;
        $conn = ConnectionManager::getInstance();
        $result = NULL;
        
        try {
            $result = $conn->exec($sql);
        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $result;
        
    }
    
    
    
    
    
}