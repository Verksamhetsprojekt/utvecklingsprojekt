<?php

$mysqli = new mysqli('localhost', 'root', '', 'test');

$serverName = "ideweb.hh.se";
$connectionInfo = array( "Database"=>"phihei", "UID"=>"phihei", "PWD"=>"ditt_lösen");
$conn = sqlsrv:_connect( $serverName, $connectionInfo);

if( $conn ) {

}else {
	echo "Connection could not be established.<br />";
	die( print_r( sqlsrv_errors(), true));
}

?>