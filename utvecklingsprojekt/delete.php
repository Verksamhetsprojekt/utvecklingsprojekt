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

			if(isset($_GET['ArticleNumber'])/*&&isset($_SESSION['userId'])*/)
{

	echo apiCall('DELETE', 'articles/'.$_DELETE["ArticleNumber"].'');

	$query = <<<END
	DELETE FROM article
	WHERE ArticleNumber = '{$_GET["ArticleNumber"]}'
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