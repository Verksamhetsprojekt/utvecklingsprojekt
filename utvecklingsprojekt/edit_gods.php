<!doctype html>
<html>
	<?php
	include('head.php');
	include('connection.php');
	include('navigation.php');
	echo $navigation;
	?>

<body>
	<div class="container text-center">
		<a href="gods.php" class="btn btn-default">Tillbaka</a><hr>
			<?php
include('config.php');

	$content = ' ';




if(isset($_GET['DocumentNumber'])&&isset($_SESSION['userId']))
{


	if(isset($_POST['utlevarea']))
	{

		$query = <<<END
		UPDATE orders
		SET utlevarea = '{$_POST["utlevarea"]}',
		hamtad = '{$_POST["hamtad"]}'
		WHERE DocumentNumber = '{$_GET["DocumentNumber"]}'
END;
echo '<span style="color:Green">Ändringarna har lagts till</span>';
}

$mysqli->query($query);


	$query = <<<END
SELECT * FROM orders
WHERE DocumentNumber = '{$_GET["DocumentNumber"]}'
END;

$res = $mysqli->query($query);
if($res->num_rows > 0)
{
$row = $res->fetch_object();
$content = <<<END
<form method="post" action="edit_gods.php?DocumentNumber={$row->DocumentNumber}">
<hr>Utlev.area: <input type="text" name="utlevarea" value="{$row->utlevarea}" placeholder="Ja/Nej"></hr>
<hr>Hämtad: <input type="text" name="hamtad" value="{$row->hamtad}" placeholder="Ja/Nej"></hr>
<hr><input type="submit" value="Spara"></hr> 
</form>
END;

}

	}

//echo navigation;
echo $content;
?>
</div>
</body>

<footer class="footer container-fluid text-center bg-light">
		<?php
		include('footer.php');
		?>
	</footer>
