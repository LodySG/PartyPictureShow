<?php

/* 
 * 
 * Développé par Dylo
 * 
 */

require_once 'lib/ConnectionManager.class.php';

class Picture
{
    
    public static function insertPicture($picture){
        
        $sql = "INSERT INTO pictures (partyid,userid,path,comment) VALUES (". $picture->partyid .",". $picture->userid .",'". $picture->path ."','". $picture->comment ."')";
        $conn = ConnectionManager::getInstance();
        $result = null;
        
        try{
            $result = $conn->exec($sql);
        } catch (Exception $ex) {
            echo "Requete erroné : ".$ex;
        }
        
        return $result;
        
    }
    
    
    public static function deletePictureById($id){
        
        $sql = "DELETE FROM pictures WHERE id = ". $id;
        $conn = ConnectionManager::getInstance();
        $result = null;
        
        try{
            $result = $conn->exec($sql);
        } catch (Exception $ex) {
            echo "Requete erroné : ".$ex;
        }
        
        return $result;
        
    }
    
    
    public static function getPicturesByPartyId($partyid){
        
        $sql = "SELECT * FROM pictures WHERE partyid = ".$partyid;
        $conn = ConnectionManager::getInstance();
        $pictures = array();
        
        try {
            $request = $conn->query($sql);
            while($obj = $request->fetch(PDO::FETCH_OBJ)){
                $pictures[] = $obj;
            }
            
            $request->closeCursor();
            
        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $pictures;
        
    }
    
    
    public static function getPicturesByUserId($userid){
        
        $sql = "SELECT * FROM pictures WHERE userid = ".$userid;
        $conn = ConnectionManager::getInstance();
        $pictures = array();
        
        try {
            $request = $conn->query($sql);
            while($obj = $request->fetch(PDO::FETCH_OBJ)){
                $pictures[] = $obj;
            }
            
            $request->closeCursor();
            
        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $pictures;
        
    }
    
    public static function getPictureById($id){
        
        $sql = "SELECT * FROM pictures WHERE id=".$id;
        $conn = ConnectionManager::getInstance();
        $picture = NULL;
        
        try {
            
            $request = $conn->query($sql);
            $obj = $request->fetch(PDO::FETCH_OBJ);
            $picture = $obj;
            $request->closeCursor();
            
        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $picture;
        
    }
    
    public static function getAllPictures(){
        
        $sql = "SELECT * FROM pictures";
        $conn = ConnectionManager::getInstance();
        $pictures = array();
        
        try {
            $request = $conn->query($sql);
            while($obj = $request->fetch(PDO::FETCH_OBJ)){
                $pictures[] = $obj;
            }
            
            $request->closeCursor();
            
        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $pictures;
        
    }
    
    
    public static function updatePictureComment($picture){
        
        $sql = "UPDATE pictures SET comment='". $picture->comment ."' WHERE id=". $picture->id;
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