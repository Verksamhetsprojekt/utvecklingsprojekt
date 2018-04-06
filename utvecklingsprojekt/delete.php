<?php
include('template.php');
if(isset($_REQUEST['artikelnr']))
{
	$query = <<<END 
	DELETE FROM artikel
	WHERE artikelnr = '{$_REQUEST['artikelnr']}'
END;
$mysqli->query($query);
header('Location:articles.php');
}
echo $navigation;
?>