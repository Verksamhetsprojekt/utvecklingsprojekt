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





/*if(isset($_GET['search'])) {
	$content .=<<<END
<form action="articles.php" method="GET">
<input type="text" name="query"/>
<input type="submit" value="Search"/>
</form>
END;

	$searchq = $_GET['search']
	$searchq = $preg_replace ("#[0-9a-z)#i","", $searchq);
	$query = mysql_query("SELECT * FROM articles WHERE Description LIKE '%searchq%' OR ArticleNumber LIKE '%searchq%'") or die ("could not search!"); }  */


include('config.php');

$products = json_decode(apiCall('GET', 'articles'), true);






//var_dump($products);
//test

if(count($products) > 0)
{
	$query = <<<END
	UPDATE article
    SET ArticleNumber = null, Description = null, DisposableQuantity = null, EAN = null, Housework = null, PurchasePrice = null, SalesPrice = null, QuantityInStock = null, ReservedQuantity = null, StockPlace = null, StockValue = null, Unit = null, VAT = null, WebShopArticle = null
END;
$mysqli->query($query);

foreach($products['Articles'] as $article)
{
	$query = <<<END
	INSERT INTO article(ArticleNumber,Description,DisposableQuantity,EAN,Housework,PurchasePrice,SalesPrice,QuantityInStock,ReservedQuantity,StockPlace,StockValue,Unit,VAT,WebshopArticle)
	VALUES('{$article["ArticleNumber"]}','{$article["Description"]}','{$article["DisposableQuantity"]}','{$article["EAN"]}','{$article["Housework"]}','{$article["PurchasePrice"]}','{$article["SalesPrice"]}','{$article["QuantityInStock"]}','{$article["ReservedQuantity"]}','{$article["StockPlace"]}','{$article["StockValue"]}','{$article["Unit"]}','{$article["VAT"]}','{$article["WebshopArticle"]}')
END;

$mysqli->query($query);
}
}

			$content = ' ';
if(isset($_POST['SupplierName']))
{
$query = <<<END
INSERT INTO article(SupplierName)
VALUES('{$_POST['SupplierName']}')
END;
}

$query = <<<END
SELECT * FROM article
ORDER BY ArticleNumber ASC
END;

//sökfuntion här fungerar ej
$content .= <<<END
<form action="articles.php" method="GET">
<input id="search" name="ArticleNumber" type="text" placeholder="Sök här...">
<input id="submit" type="submit" value="Sök">
</form>
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
	</tr>
END;
	while($row = $res->fetch_object())
	{

			$content .= <<<END
	<tr>
	    <td>{$row->ArticleNumber}</td>
	    <td>{$row->Description}</td>
	    <td>{$row->SalesPrice}</td>
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