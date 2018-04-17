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
			if(isset($_GET['artikelnr'])&&isset($_SESSION['userId']))
{
	$query = <<<END
	DELETE FROM artikel
	WHERE artikelnr = '{$_GET["artikelnr"]}'
END;
$mysqli->query($query);
echo '<span style="color:Red">Artikeln har raderats</span>';
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