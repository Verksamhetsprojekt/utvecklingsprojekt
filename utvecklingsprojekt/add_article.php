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
			if(isset($_POST['Description'])&&isset($_SESSION['userId']))
{
	$query = <<<END
	INSERT INTO article(Description,SalesPrice,StockPlace)
	VALUES('{$_POST['Description']}','{$_POST['SalesPrice']}',
	'{$_POST['StockPlace']}')
END;
$mysqli->query($query);
echo '<span style="color:Green">Artikel har lagts till</span>';
} 

$content = <<<END
<form method="post" action="add_article.php">
<input
  type="text"
        name="Description" required
        placeholder="Benämningn"
        title="Benämning krävs">
<input
  type="text"
        name="SalesPricen" required
        placeholder="Pris"
        title="Pris krävs">
<input
  type="text"
        name="StockPlace" required
        placeholder="Lagerplats"
        title="Lagerplats krävs">
<input type="submit" Value="Lägg till artikel">
</form>
END;
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