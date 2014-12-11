<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ConnectionManager
{
    
    private $PDOInstance;
    
    private static $instance;
    
    const DEFAULT_SQL_USER = 'root';
    const DEFAULT_SQL_PASSWORD = 'root';
    const DEFAULT_SQL_DTB = 'partypictureshow';
    const DEFAULT_SQL_HOST = 'localhost';
    const DEFAULT_SQL_PORT = 3306;
    
    
    private function __construct()
    {
      try 
      {
        $this->PDOInstance = new PDO('mysql:dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST.';port='.self::DEFAULT_SQL_PORT, self::DEFAULT_SQL_USER, self::DEFAULT_SQL_PASSWORD);
        $this->PDOInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      }catch (PDOException $ex)
      {
          echo $ex;
      }
    }
    
    public static function getInstance()
    {  
        if(is_null(self::$instance))
        {
          self::$instance = new ConnectionManager();
          //echo '1er Connection OK </br>';
        }
        //echo 'Passé </br>';
        return self::$instance;
    }
    
    
    public function query($query)
    {
        $statement = NUll;
        
        try {
            $this->PDOInstance->beginTransaction();
            $statement = $this->PDOInstance->query($query);
            $this->PDOInstance->commit();
            
        } catch (PDOException $ex) {
            echo "Erreur dans la requete : ".$ex;
            $this->PDOInstance->rollBack();
        }
        
        return $statement;
        
    }
    
    public function exec($query)
    {
        $statement = NUll;
        
        try {
            $this->PDOInstance->beginTransaction();
            $statement = $this->PDOInstance->exec($query);
            $this->PDOInstance->commit();
            
        } catch (PDOException $ex) {
            echo "Erreur dans la requete : ".$ex;
            $this->PDOInstance->rollBack();
        }
        
        return $statement;
        
    }
    
    
}


