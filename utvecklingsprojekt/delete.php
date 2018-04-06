<?php
include('template.php');
if(isset($_GET['artikelnr']))
{
	$query = <<<END 
	DELETE FROM artikel
	WHERE artikelnr = '{$_GET['artikelnr']}'
END;
$mysqli->query($query);
header('Location:articles.php');
}
echo $navigation;
?>