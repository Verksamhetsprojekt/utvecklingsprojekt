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

$order = json_decode(apiCall('GET', 'orders'), true);

//var_dump($order);

if(count($order) > 0)
{
	$query = <<<END
	DELETE FROM orders
END;
$mysqli->query($query);

foreach($order['Orders'] as $orders)
{
	$query = <<<END
	INSERT INTO orders(Cancelled,Currency,CustomerName,CustomerNumber,DeliveryDate,DocumentNumber,ExternalInvoiceReference,OrderDate,Project,Sent,Total)
	VALUES('{$orders["Cancelled"]}','{$orders["Currency"]}','{$orders["CustomerName"]}','{$orders["CustomerNumber"]}','{$orders["DeliveryDate"]}','{$orders["DocumentNumber"]}','{$orders["ExternalInvoiceReference"]}','{$orders["OrderDate"]}','{$orders["Project"]}','{$orders["Sent"]}','{$orders["Total"]}')
END;
$mysqli->query($query);
}
}


			$content = ' ';
$query = <<<END
SELECT * FROM orders
ORDER BY CustomerName ASC
END;

$res = $mysqli->query($query);
if($res->num_rows > 0)
{
	$content .= <<<END

	<table class="table">
	<tr>
	    <th>Kundnamn</th>
	    <th>Beställningsdatum</th>
	    <th>Leveransdatum</th>
	    <th>Totalt</th>
	    <th>Hämtad</th>
	    <th>Utleveransarea</th>
	</tr>
END;
	while($row = $res->fetch_object())
	{
$content .= <<<END

<tr>
	   <form method= "post" action="edit_gods.php?DocumentNumber={$row->Documentnumber}">
<td>{$row->CustomerName}</td>
         <td>{$row->OrderDate}</td>
         <td>{$row->DeliveryDate}</td>
         <td>{$row->Total}</td>

<th><input type="checkbox" name="Status" value="Hämtad"></th>
<th><input type="checkbox" name="Status" value="Utleveransarea"></th>
<th><input type="submit" value="Spara" </form></th>
         <th><a href="edit_gods.php?DocumentNumber={$row->DocumentNumber}">Redigera artikel</a></th>
  </tr>
    
END;


}
}
$content .= '</table>';
echo $content;




			/*$content = <<<END
<h1>Välkommen till HFAB</h1>
<p>Här hanteras gods och lager</p>
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