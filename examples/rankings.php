<?php
/**
 * Maniaplanet Web Services SDK for PHP
 *
 * @copyright   Copyright (c) 2009-2011 NADEO (http://www.nadeo.com)
 * @license     http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @author      $Author$:
 * @version     $Revision$:
 * @date        $Date$:
 */
require_once __DIR__.'/../libraries/autoload.php';

echo "Enter your API username:\n";
$username = trim(fgets(STDIN));

echo "Enter your API password:\n";
$password = trim(fgets(STDIN));

$players = new \Maniaplanet\WebServices\Players($username, $password);


try
{
	echo "Enter a ManiaPlanet user login:\n";
	$user = trim(fgets(STDIN));
	
	echo "Canyon rankings:";
	$canyonRankings = new \Maniaplanet\WebServices\Rankings\Canyon($user, $password);
	print_r($canyonRankings->getMultiplayerWorld());
}
catch(\Maniaplanet\WebServices\Exception $e)
{
	echo "Error!\n";
	printf('HTTP Response: %d %s', $e->getHTTPStatusCode(),
		$e->getHTTPStatusMessage());
	echo "\n";
	printf('API Response: %s (%d)', $e->getMessage(), $e->getCode());
	echo "\n";
}
echo "\n";

?>