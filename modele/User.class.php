<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'lib/ConnectionManager.class.php';

class User
{
    
    public static function insertUser($user){
        
        $sql = "INSERT INTO users (pseudo,macadress) VALUES ('".$user->pseudo ."','".$user->macadress."')";
        $conn = ConnectionManager::getInstance();
        $result = null;
        
        try{
            $result = $conn->exec($sql);
        } catch (Exception $ex) {
            echo "Requete erroné : ".$ex;
        }
        
        return $result;
        
    }
    
    
    public static function getAllUser() {
        
        $sql = "SELECT * FROM users";
        $conn = ConnectionManager::getInstance();
        $users = array();
        
        try {
            $request = $conn->query($sql);
            while($obj = $request->fetch(PDO::FETCH_OBJ)){
                $users[] = $obj;
            }
            
            $request->closeCursor();
            
        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $users;
        
    }
    
    
    public static function getUserById($id) {
        
        $sql = "SELECT * FROM users WHERE id=".$id;
        $conn = ConnectionManager::getInstance();
        $user = NULL;
        
        try {
            
            $request = $conn->query($sql);
            $obj = $request->fetch(PDO::FETCH_OBJ);
            $user = $obj;
            $request->closeCursor();
            
        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $user;
        
    }
    
    
    public static function getUserByMacAdress($macadress) {
        
        $sql = "SELECT * FROM users WHERE macadress = '".$macadress."'";
        $conn = ConnectionManager::getInstance();
        $user = NULL;
        
        try {
            $request = $conn->query($sql);
            $obj = $request->fetch(PDO::FETCH_OBJ);
            $user = $obj;
            
            $request->closeCursor();

            
        }catch (PDOException $ex){
            echo "Requete erroné : ".$ex;
        }
        
        return $user;
        
    }
    
    
    public static function updateUserPseudo($user) {
        
        $sql = "UPDATE users SET pseudo='". $user->pseudo ."' WHERE id=". $user->id ." AND macadress='". $user->macadress ."'";
        $conn = ConnectionManager::getInstance();
        $result = NULL;
        
        try{
            $result = $conn->exec($sql);
        } catch (Exception $ex) {
            echo "Requete erroné : ".$ex;
        }
        
        return $result;
        
    }
    
    
    public static function deleteUserById($id) {
        
        $sql = "DELETE FROM users WHERE id = ".$id;
        $conn = ConnectionManager::getInstance();
        $result = null;
        
        try{
            $result = $conn->exec($sql);
        } catch (Exception $ex) {
            echo "Requete erroné : ".$ex;
        }
        
        return $result;
        
    }
    
    
    public static function deleteUserByMacAdress($macadress) {
        
        $sql = "DELETE FROM users WHERE macadress = '".$macadress."'";
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