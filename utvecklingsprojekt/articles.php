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

if(count($products) > 0)
{
	$query = <<<END
	DELETE FROM article
END;
$mysqli->query($query);
	/*$content .= <<<END
	<table class="table">
	<tr>
	    <th>ArticleNumber</th>
	    <th>Description</th>
	    <th>Sales Price</th>
	</tr>
END;*/
foreach($products['Articles'] as $article)
{
	$query = <<<END
	INSERT INTO article(ArticleNumber,Description,DisposableQuantity,EAN,Housework,PurchasePrice,SalesPrice,QuantityInStock,ReservedQuantity,StockPlace,StockValue,Unit,VAT,WebshopArticle, created_at)
	VALUES('{$article["ArticleNumber"]}','{$article["Description"]}','{$article["DisposableQuantity"]}','{$article["EAN"]}','{$article["Housework"]}','{$article["PurchasePrice"]}','{$article["SalesPrice"]}','{$article["QuantityInStock"]}','{$article["ReservedQuantity"]}','{$article["StockPlace"]}','{$article["StockValue"]}','{$article["Unit"]}','{$article["VAT"]}','{$article["WebshopArticle"]}','{$article["created_at"]}')
END;
$mysqli->query($query);
}
}
	/*$content .= <<<END
	<tr>
	    <td>{$article['ArticleNumber']}</td>
	    <td>{$article['Description']}</td>
	    <td>{$article['SalesPrice']}</td>
	</tr>
END;
}

$content .= '</table>';
}
*/


			$content = ' ';
$query = <<<END
SELECT * FROM article
ORDER BY created_at DESC
END;


$res = $mysqli->query($query);
if($res->num_rows > 0)
{
	while($row = $res->fetch_object())
	{
$content .= <<<END
<table class="table">
<caption>{$row->Description}</caption>
  <tr>
         <th>{$row->SalesPrice}</th>
         <th><a href="article_details.php?ArticleNumber={$row->ArticleNumber}">Läs mer</a></th>
  </tr>
     
END;
}
$content .= '</table>';
}
		if(isset($_SESSION['userId']))
		{
			    $content .= <<<END
			    <a href="edit_article.php?ArticleNumber={$row->ArticleNumber}">Redigera artikel</a><br>
			    <a href="delete.php?ArticleNumber={$row->ArticleNumber}="deletelink" onclick="return confirm('Är du säker på att du vill radera artikeln?')">Radera artikel</a></br>
				
END;
		}
        
   // $content .= '<hr>';

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