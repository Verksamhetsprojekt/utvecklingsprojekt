<?php

$content = <<<END
<h1>Du är nu utloggad. Hejdå!</h1>
<p>Ses nästa gång :)</p>
END;



$_SESSION = array();
session_destroy();

//header("Location:index.php");
header("refresh:0;url=index.php");
 echo '<script type="text/javascript">alert("Du loggas nu ut, välkommen åter");</script>';

  
echo $content;
?>


