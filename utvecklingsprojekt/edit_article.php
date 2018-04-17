<!doctype html>
<html>
	<?php
	include('head.php');
	include('connection.php');
	include('navigation.php');
	echo $navigation;
	?>
<!-- Här börjar Body - här lägger du in kod som ska visas i $content -->
	<body>
		<div class="container text-center">
			<?php
			$content = ' ';
if(isset($_GET['artikelnr'])&&isset($_SESSION['userId']))
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
	echo '<span style="color:Green">Ändringarna har lagts till</span>';}

	
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
			echo $content;
			?>
		</div>
	</body>
<!-- Här slutar Body-->

	<footer class="footer container-fluid text-center bg-light">
		<?php
		include('footer.php');
		?>
	</footer>

</html>