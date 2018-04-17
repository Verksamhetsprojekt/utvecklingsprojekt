<!doctype html>
<html>
	<?php
	include('head.php');
	include('connection.php');
	include('navigation.php');
	?>

	<header>
  		<div class="container-fluid text-center">	
			<h1>Välkommen till Hellströms Fordonsteknik AB</h1>
			<h6><i>Din specialistpartner sedan 1967</i></h6><hr>
		</div>
		<?php
		echo $navigation;
		?>
	</header>

<!-- Här börjar Body - här lägger du in kod som ska visas i $content -->
	<body>
		<div class="container text-center">
			<?php
			if(isset($_POST))
{
	$content = <<<END
	<h3>Message was sent:</h3>
	Name: {$_POST["name"]}
	<br>
	Message: {$_POST["msg"]}
END;
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