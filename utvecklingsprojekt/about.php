<meta charset?"utf-8">

<?php
include('template.php');
$content = <<<END
<h1>Om HFAB</h1>
<p>Om Hellströms Fordonsteknik AB (HFAB)
Företaget HFAB har funnits sedan 1967 och verksamheten består i dagsläget av 33 medarbetare. Man tillverkar ett hundratal artiklar för fordonsteknik, exempelvis tankar, vattenpumpar och ventiler som blivit ett specialistområde. </p>

<h3>Skicka ett meddelande</h3>
<form action="send.php" method="post">
<input type="text" name="name" placeholder="Name">
<br>
<textarea name="msg" placeholder="Message"></textarea>
<br>
<input type="submit" value="Skicka">
</form>
END;

echo $navigation;
echo $content;
echo $footer;

?>