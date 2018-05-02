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
			<?php
include('config.php');
	$content = ' ';
if(isset($_GET['DocumentNumber']))
{
	$query = <<<END
SELECT * FROM orders
WHERE DocumentNumber = '{$_GET["DocumentNumber"]}'
END;
$res = $mysqli->query($query);
if($res->num_rows > 0)
{
$row = $res->fetch_object();
$content = <<<END
<form method= "post" action="edit_gods.php?DocumentNumber={$row->Documentnumber}">
<input type="text" name="name" value="{$row->name}">
<input type="text" name="name" value="{$row->name}">
<input type="text" name="name" value="{$row->name}">
<input type="submit" value="Spara" </form>
END;

}

	}
//echo navigation;
echo content;
?>
</div>
</body>

<footer class="footer container-fluid text-center bg-light">
		<?php
		include('footer.php');
		?>
	</footer>
