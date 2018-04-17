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
			$content = <<<END
			<h2>Om HFAB</h2>
				<p>Företaget HFAB har funnits sedan 1967 och verksamheten består i dagsläget av 33 medarbetare. Man tillverkar ett hundratal artiklar för fordonsteknik, exempelvis tankar, vattenpumpar och ventiler som blivit ett specialistområde.</p>
				<h3>Skicka ett meddelande</h3>
				<form action="send.php" method="post">
				<input type="text" name="name" placeholder="Name">
				<br>
				<textarea name="msg" placeholder="Message"></textarea>
				<br>
				<input type="submit" value="Skicka">
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