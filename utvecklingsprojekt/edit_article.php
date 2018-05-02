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

			include('config.php');

			$content = ' ';
if(isset($_GET['ArticleNumber'])/*&&isset($_SESSION['userId'])*/)
{

	if(isset($_POST['Description']))
	{
		$body = '{"Article":{"Description":"'.$_POST['Description'].'","StockPlace":"'.$_POST['StockPlace'].'"}}';
echo apiCall('PUT', 'articles/'.$_GET['ArticleNumber'].'', $body);


		$query = <<<END
		UPDATE article
		SET Description = '{$_POST["Description"]}',
		StockPlace = '{$_POST["StockPlace"]}'
		WHERE ArticleNumber = '{$_GET["ArticleNumber"]}'
END;
}

$mysqli->query($query);
echo '<span style="color:Green">Ändringarna har lagts till</span>';

	
	$query = <<<END
	SELECT * FROM article
	WHERE ArticleNumber = '{$_GET["ArticleNumber"]}'
END;

$res = $mysqli->query($query);
if($res->num_rows > 0)
{
	$row = $res->fetch_object();
	$content = <<<END
	<form method="post" action="edit_article.php?ArticleNumber={$row->ArticleNumber}">
    <input type="text" name="Description" value="{$row->Description}">
    <input type="text" name="StockPlace" value="{$row->StockPlace}">
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