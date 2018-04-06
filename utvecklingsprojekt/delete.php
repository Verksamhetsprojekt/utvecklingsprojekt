<?php
include('template.php');
if(isset($_GET['id']))
{
	$query = <<<END 
	DELETE FROM artikel
	WHERE id = '{$_GET['id']}'
END;
$mysqli->query($query);
header('Location:articles.php');
}
echo $navigation;
?>