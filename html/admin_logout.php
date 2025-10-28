<DIV CLASS="stranka">
<CENTER>

<?php
  function f($dir){}
  
  $logged_out = session_destroy();      
  if ($logged_out) {
    echo "\r\n\tPrave si bol uspesne odhlaseny<BR><BR>";
    echo "\r\n\t<A HREF=\"site.php\"><B>NA HLAVNU STRANKU</B></A><BR>&nbsp;<BR>\r\n";
  } else {
    echo "\r\n\tNepodarilo sa ta odregistrovat!!!<BR>";
  }
?>

</CENTER>
</DIV>
