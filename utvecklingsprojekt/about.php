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
		<body class="body">
		<div class="container">
		<div style="text-align: center;">
    <div style="display: inline-block; text-align: left;">

			<?php
			$content = <<<END
			<h3>Om HFAB</h3>
				
				<p>Företaget HFAB har funnits sedan 1967 och verksamheten består i dagsläget av 33 medarbetare. Vi tillverkar ett hundratal artiklar för fordonsteknik, exempelvis tankar, vattenpumpar och ventiler som blivit ett specialistområde.</p>
				<h5>Vision</h5>
<p>HFABs vision är att vara en ledande aktör inom komponenttillverkning till fordonsindustrin. Genom en tydlig fokusering på kundnytta, utvecklingsmöjligheter och konkurrenskraftiga lösningar. De tre senaste åren har ett omfattande investeringsprogram genomförts, framför allt gällande automatiserad produktionsutrustning, tjänsteutveckling och lagerhantering. Detta ska resultera i effektiva, flexibla och moderna tjänster samt strömlinjeformade produktions- och distribueringskedjor.</p>
<hr>
				<h4>Kontakta oss</h4>
				<table class="table table-bordered">
				<tr>
				<th>Telefonnummer:</th>
				<th>Email:</th>
				<th>Adress:</th>
				</tr>
				<tr>
				<td>035 935941315</td>
				<td>info@hfab.se</td>
				<td>Skogsmullevägen 13, 423 64 Västervik</td>
				</table><br><br>
			

END;
			echo $content;
			?>
		</div>
	</div>
</div>
	

	</body>
<!-- Här slutar Body-->

	<footer class="footer container-fluid text-center bg-light">
		<?php
		include('footer.php');
		?>
	</footer>

</html>