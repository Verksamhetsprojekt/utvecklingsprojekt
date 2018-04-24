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



$content = '<h1>Leverantörsfakturor</h1>';

$suppliers = json_decode(apiCall('GET', 'supplierinvoices'), true);

var_dump($suppliers);

if(count($suppliers) > 0)
{
	$query = <<<END
	DELETE FROM supplierinvoices
END;
$mysqli->query($query);

//FUNGERAR INTE HÄRIFRÅN, SKA FIXA SEN

foreach($suppliers['supplierinvoices'] as $supplierinvoices)
{
	$query = <<<END
	INSERT INTO supplierinvoices(Balance,Booked,Cancel,Currency,DueDate,GivenNumber,InvoiceDate,InvoiceNumber,SupplierNumber,SupplierName,Total,AuthorizerName)
	VALUES('{$supplierinvoices["Balance"]}','{$supplierinvoices["Booked"]}','{$supplierinvoices["Cancel"]}','{$supplierinvoices["Currency"]}','{$supplierinvoices["DueDate"]}','{$supplierinvoices["GivenNumber"]}','{$supplierinvoices["InvoiceDate"]}','{$supplierinvoices["InvoiceNumber"]}','{$supplierinvoices["SupplierNumber"]}','{$supplierinvoices["SupplierName"]}','{$supplierinvoices["Total"]}','{$supplierinvoices["AuthorizerName"]}')
END;
$mysqli->query($query);
}
}

     $content = ' ';
     $query = <<<END
     SELECT * FROM SupplierInvoices
END;

echo "HEJ";

			/*$content = <<<END
<h1>Välkommen till HFAB</h1>
<p>Här hittar du statistik för leverantörer samt ett internt lagerhanteringssystem</p>
END;
			echo $content;*/
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