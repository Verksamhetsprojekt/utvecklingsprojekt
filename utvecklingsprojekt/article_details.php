<?php
include('template.php');
$content = ' ';
if(isset($_GET['id']))
{
	$query = <<<END 
	SELECT * FROM artikel
	WHERE id = '{$_GET['id']}'
END;

$res = $mysqli->query($query);
if($res->num_rows > 0)
{
	$row = $res->fetch_object();
	$content = <<<END 
	Artikelnr: {$row->id}<br>
	Benämning: {$row->benamning}<br>
	Pris: {$row->utpris_prislista_a}<br>
	Lagerplats: {$row->lagerplats}<br>
	Datum: {$row->created_at}
END;
}
}

echo $navigation;
echo $content;
?>