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
			<h2>Välkommen till HFAB!</h2>
			<p>Hej och välkommen till Hellströms Fordonsteknik AB.</p>
			<p>Som anställd hos oss kan du här utföra viktiga arbetsrelaterade uppgifter och hålla dig uppdaterad kring bland annat våra artiklar, kundordrar och leverantörsfakturor!</p>
			<p>Är ni en av våra underleverantörer kan ni här följa upp fakturor och även se intressant statistik om era ärenden hos HFAB!</p>
			<p>Vänligen logga in för att se mer!</p>
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