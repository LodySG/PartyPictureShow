<?php

/*
 * 
 * Développé par Dylo
 * 
 */

/**
 * Description of Connected
 *
 * @author Dylo <the Boss at Boss.org>
 */

require_once 'lib/ConnectionManager.class.php';

class Connected {
    
    public static function connectUser($iduser){
        
        if(self::isConnected($iduser)){
            
            $sql = "UPDATE connected SET timestamp= ".time()." WHERE iduser=".$iduser;
            $conn = ConnectionManager::getInstance();
            $result = NULL;

            try{
                $conn->exec($sql);
            } catch (Exception $ex) {
                echo "Requete erroné : ".$ex;
            }
            
        }else {
            
            $sql = "INSERT INTO connected (iduser,timestamp) VALUES (".$iduser.",".time().")";
            $conn = ConnectionManager::getInstance();
        
            try{
                $conn->exec($sql);
            } catch (Exception $ex) {
                echo "Requete erroné : ".$ex;
            }

        }
        
        self::cleanConnected();
        
    }
    
    public static function getAllConnected(){
        
        $sql = "SELECT * FROM connected";
        $conn = ConnectionManager::getInstance();
        $connected = array();

        try {
            $request = $conn->query($sql);
            while($obj = $request->fetch(PDO::FETCH_OBJ)){
                $connected[] = $obj;
            }

            $request->closeCursor();

        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $connected;
    }
    
    public static function isConnected($iduser){
        
        $sql = "SELECT * FROM connected WHERE iduser=".$iduser.";";
        $conn = ConnectionManager::getInstance();
        $connected = array();

        try {
            $request = $conn->query($sql);
            $obj = $request->fetch(PDO::FETCH_OBJ);
            $user = $obj;
            
            $request->closeCursor();

        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        if($user){
            return TRUE;
        }else {
            return FALSE;
        }
        
    }
    
    public static function cleanConnected(){
        
        $sql = "DELETE FROM connected WHERE timestamp + ".INACTIVE_TIME."<=".time();
        $conn = ConnectionManager::getInstance();
        $result = null;
        
        try{
            $result = $conn->exec($sql);
        } catch (Exception $ex) {
            echo "Requete erroné : ".$ex;
        }
        
        return $result;
        
    }
    
    
    
}
