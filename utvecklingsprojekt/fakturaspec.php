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
			if(isset($_GET['SupplierNumber']))
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
	Leverantör: {$row->SupplierName}<br>
	Fakturadatum: {$row->InvoiceDate}<br>
	Förfallodatum: {$row->DueDate}<br>
	Totalt: {$row->Total}<br>
	Valuta: {$row->Currency}<br>
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


















