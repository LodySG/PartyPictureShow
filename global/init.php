<?php

/* 
 * 
 * Développé par Dylo
 * 
 */

// Inclusion du fichier de configuration (qui définit des constantes)
include 'global/config.php';

session_start();

// Désactivation des guillemets magiques
/*ini_set('magic_quotes_runtime', 0);
set_magic_quotes_runtime(0);

if (1 == get_magic_quotes_gpc())
{
	function remove_magic_quotes_gpc(&$value) {
	
		$value = stripslashes($value);
	}
	array_walk_recursive($_GET, 'remove_magic_quotes_gpc');
	array_walk_recursive($_POST, 'remove_magic_quotes_gpc');
	array_walk_recursive($_COOKIE, 'remove_magic_quotes_gpc');
}*/

// Inclusion de libriarie, potentiellement utile partout
require_once 'lib/ConnectionManager.class.php';
require_once 'lib/NetworkManager.class.php';
require_once 'lib/FormPrecis.class.php';
require_once 'lib/Image.php';
require_once 'lib/rain.tpl.class.php';
require_once 'lib/Utils.class.php';

raintpl::configure( 'tpl_dir', 'vues/' ); // template directory
raintpl::configure( 'cache_dir', 'cache/' ); // cache directory
raintpl::configure( 'tpl_ext', 'tpl' ); // cache directory$tpl_ext