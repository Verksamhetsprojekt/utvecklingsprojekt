<?php
include('template.php');
if(isset($_POST['benamning']))
{
	$query = <<<END
	INSERT INTO artikel(benamning,utpris_prislista_a,lagerplats)
	VALUES('{$_POST['benamning']}','{$_POST['utpris_prislista_a']}',
	'{$_POST['lagerplats']}')
END;
$mysqli->query($query);
echo 'Artikel har lagts till';
} 

$content = <<<END
<form method="post" action="add_article.php">
<input type="text" name="benamning" placeholder="Benämning">
<input type="text" name="utpris_prislista_a" placeholder="Pris">
<input type="text" name="lagerplats" placeholder="Lagerplats">
<input type="submit" Value="Lägg till artikel">
</form>
END;
echo $navigation;
echo $content;
?>