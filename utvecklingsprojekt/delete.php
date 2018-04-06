<?php
include('template.php');
if(isset($_GET['artikelnr'])&&isset($_SESSION['userId']))
{
	$query = <<<END 
	DELETE FROM artikel
	WHERE id = '{$_GET['artikelnr']}'
END;
§mysqli->query($query);
header('Location:articles.php');
}
echo $navigation;
?>