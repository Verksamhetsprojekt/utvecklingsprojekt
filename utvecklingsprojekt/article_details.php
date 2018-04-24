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
			if(isset($_GET['ArticleNumber']))
{
	$query = <<<END
	SELECT * FROM article
	WHERE ArticleNumber = '{$_GET["ArticleNumber"]}'
END;

$res = $mysqli->query($query);
if($res->num_rows > 0)
{
	$row = $res->fetch_object();
	$content .= <<<END
	<form method="get" action="article_details.php">
	Artikelnr: {$row->ArticleNumber}<br>
	Benämning: {$row->Description}<br>
	Pris: {$row->SalesPrice}<br>
	Lagerplats: {$row->StockPlace}<br>
	Antal i lager: {$row->QuantityInStock}
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