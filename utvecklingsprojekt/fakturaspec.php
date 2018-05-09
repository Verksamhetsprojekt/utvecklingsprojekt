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
			<a href="fakturor.php" class="btn btn-default">Tillbaka</a><hr>
			<?php
			if(isset($_GET['SupplierNumber'])&&(isset($_SESSION['userId'])))
{
	$query = <<<END
	SELECT * FROM supplierinvoices
	WHERE SupplierNumber = '{$_GET["SupplierNumber"]}'
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
	Betalt den: {$row->PaidInFull}<br>
	Bokfört: {$row->Booked}
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


















