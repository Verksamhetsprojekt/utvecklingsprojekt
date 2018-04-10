<?php
include('template.php');
$content = ' ';
if(isset($_GET['artikelnr']))
{
	$query = <<<END 
	SELECT * FROM artikel
	WHERE artikelnr = '{$_GET['artikelnr']}'
END;

$res = $mysqli->query($query);
if($res->num_rows > 0)
{
	$row = $res->fetch_object();
	$content = <<<END 
	<form method="get" action="article_details.php">
	Artikelnr: {$row->artikelnr}<br>
	Benämning: {$row->benamning}<br>
	Pris: {$row->utpris_prislista_a}<br>
	Lagerplats: {$row->lagerplats}<br>
	Datum: {$row->created_at}
	</form>
END;
//}
}

echo $navigation;
echo $content;
?>