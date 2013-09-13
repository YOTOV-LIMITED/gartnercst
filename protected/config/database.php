<?php

/**
 * @version $Id: database.php 2746 2012-10-09 01:57:39Z lida $ 
 */

$databaseConfig = array(
    // application components
    'components' => array (
        // uncomment the following to use a MySQL database
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=xmas',
            'emulatePrepare' => true,
	        'username' => 'root',
            'password' => 'MagicTony1q2w3e4r',
            'charset' => 'utf8',
        	//'tablePrefix' => 'bigbang_',
        )
    )
);
return $databaseConfig;

?>
