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
		<div class="container">
		<div style="text-align: center;">
    <div style="display: inline-block; text-align: left;">
			<a href="fakturor.php" class="btn btn-default">Tillbaka</a><hr>
			<?php
			if(isset($_GET['GivenNumber'])&&(isset($_SESSION['userId'])))
{
	$query = <<<END
	SELECT * FROM supplierinvoices
	WHERE GivenNumber = '{$_GET["GivenNumber"]}'
END;

$res = $mysqli->query($query);
if($res->num_rows > 0)
{
	$row = $res->fetch_object();
	$content .= <<<END
	<form method="get" action="fakturaspec.php">
	Fakturanr: {$row->GivenNumber}<br>
	Leverantörsnr: {$row->SupplierNumber}<br>
	Leverantör: {$row->SupplierName}<br>
	Fakturadatum: {$row->InvoiceDate}<br>
	Förfallodatum: {$row->DueDate}<br>
	Totalt: {$row->Total}<br>
	Valuta: {$row->Currency}<br>
	Betaldatum <small><i>(0000-00-00 = OBETALD)</i></small>: {$row->PaidInFull}<br>
	Bokfört: {$row->Booked}
	</form>
END;
}
}
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


















