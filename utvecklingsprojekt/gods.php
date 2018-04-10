<?php
include('template.php');

$content = <<<END
<h1>Välkommen till HFAB</h1>
<p>Här hittar du statistik för leverantörer samt ett internt lagerhanteringssystem</p>
END;

echo $navigation;
echo $content;

?>