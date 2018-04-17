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
			if(isset($_POST['benamning'])&&isset($_SESSION['userId']))
{
	$query = <<<END
	INSERT INTO artikel(benamning,utpris_prislista_a,lagerplats)
	VALUES('{$_POST['benamning']}','{$_POST['utpris_prislista_a']}',
	'{$_POST['lagerplats']}')
END;
$mysqli->query($query);
echo '<span style="color:Green">Artikel har lagts till</span>';
} 

$content = <<<END
<form method="post" action="add_article.php">
<input type="text" name="benamning" placeholder="Benämning">
<input type="text" name="utpris_prislista_a" placeholder="Pris">
<input type="text" name="lagerplats" placeholder="Lagerplats">
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