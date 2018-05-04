<!doctype html>
<html>
	<?php
	include('head.php');
	include('connection.php');
	include('navigation.php');
	echo $navigation;
	?>

<!-- Här börjar Body - här lägger du in kod som ska visas i $content -->
	<body class="body">
		<div class="container text-center">
	
			<?php

include('config.php');

$products = json_decode(apiCall('GET', 'articles'), true);

//var_dump($products);
//test

if(count($products) > 0)
{
	$query = <<<END
	DELETE FROM article
END;
$mysqli->query($query);

foreach($products['Articles'] as $article)
{
	$query = <<<END
	INSERT INTO article(ArticleNumber,Description,DisposableQuantity,EAN,Housework,PurchasePrice,SalesPrice,QuantityInStock,ReservedQuantity,StockPlace,StockValue,Unit,VAT,WebshopArticle,SupplierName)
	VALUES('{$article["ArticleNumber"]}','{$article["Description"]}','{$article["DisposableQuantity"]}','{$article["EAN"]}','{$article["Housework"]}','{$article["PurchasePrice"]}','{$article["SalesPrice"]}','{$article["QuantityInStock"]}','{$article["ReservedQuantity"]}','{$article["StockPlace"]}','{$article["StockValue"]}','{$article["Unit"]}','{$article["VAT"]}','{$article["WebshopArticle"]}','{$article["SupplierName"]}')
END;
$mysqli->query($query);
}
}

			$content = ' ';
$query = <<<END
SELECT * FROM article
ORDER BY ArticleNumber ASC
END;


$res = $mysqli->query($query);
if($res->num_rows > 0)
{
			$content .= <<<END
	<table class="table">
	<tr>
	    <th>Artikelnummer</th>
	    <th>Benämning</th>
	    <th>Pris</th>
	    <th>Leverantör</th>
	</tr>
END;
	while($row = $res->fetch_object())
	{

			$content .= <<<END
	<tr>
	    <td>{$row->ArticleNumber}</td>
	    <td>{$row->Description}</td>
	    <td>{$row->SalesPrice}</td>
	    <td>{$row->SupplierName}</td>
	    <th><a href="article_details.php?ArticleNumber={$row->ArticleNumber}">Läs mer</a></th>

END;


/*$content .= <<<END
<table class="table">
<caption>{$row->Description}</caption>
  <tr>
         <th>{$row->SalesPrice}</th>
         <th><a href="article_details.php?ArticleNumber={$row->ArticleNumber}">Läs mer</a></th>
  </tr>
END;  

*/

		//if(isset($_SESSION['userId']))
		{
			    
			    $content .= <<<END
			    <th><a href="edit_article.php?ArticleNumber={$row->ArticleNumber}">Redigera artikel</a></th>
			    <th><a href="delete.php?ArticleNumber={$row->ArticleNumber}" onclick="return confirm('Är du säker på att du vill radera artikeln?')">Radera artikel</a></th>
			    </tr>

				
END;



		}

	}

}
  $content .= '</table>';
 $content .= '<hr>';

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