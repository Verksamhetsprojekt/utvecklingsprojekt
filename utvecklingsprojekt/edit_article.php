<?php
include('template.php');
$content = ' ';
if(isset($_GET['artikelnr']))
{
	if(isset($_POST['benamning']))
	{
		$query = <<<END
		UPDATE artikel
		SET benamning = '{$_POST["benamning"]}',
		utpris_prislista_a = '{$_POST["utpris_prislista_a"]}',
		lagerplats = '{$_POST["lagerplats"]}'
		WHERE artikelnr = '{$_GET["artikelnr"]}'
END;
    $mysqli->query($query);
	}
	
	$query = <<<END
	SELECT * FROM artikel
	WHERE artikelnr = '{$_GET["artikelnr"]}'
END;

$res = $mysqli->query($query);
if($res->num_rows > 0)
{
	$row = $res->fetch_object();
	$content = <<<END 
	<form method="post" action="edit_article.php?artikelnr={$row->artikelnr}">
    <input type="text" name="benamning" value="{$row->benamning}">
    <input type="text" name="utpris_prislista_a" value="{$row->utpris_prislista_a}">
    <input type="text" name="lagerplats" value="{$row->lagerplats}">
    <input type="submit" Value="Spara">
    </form>
END;
}
}

echo $navigation;
echo $content;
echo $footer;
?>