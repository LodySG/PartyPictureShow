<?php

error_reporting(E_ALL);
ini_set('display_errors','On');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "TEST </br>";

//include_once 'modele/ConnectionManager.class.php';
//ConnectionManager::getInstance();

include_once 'modele/User.class.php';

//print_r(User::getAllUser());

//$username = User::getUserById(1);

/*if(is_object($username)){
  echo $username->pseudo;
  echo $username->id;
  echo $username->isadmin;
  echo $username->macadress;
}*/

/*$user = new stdClass();

$user->pseudo = "Layla";
$user->macadress = "MADOUDOU";
*/

//$nbreresult = User::deleteUserByMacAdress("MADOUDOU");

//echo "Nbre insertion : ".$nbreresult;

/*$user = new stdClass();

$user->pseudo = "Lody";
$user->macadress = "ZZZZZZZZ";
$user->id = 1;

$result = User::updateUserPseudo($user);

echo $result ." affectations";*/

//snmpwalk("127.0.0.1", "public", null);

$a = snmpwalk("localhost", "public", "");
 
foreach ($a as $val) {
	echo "$val\n";
}