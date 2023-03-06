<?
// -------------------------------------------------------------------------- //  
    if ( $_SESSION['typ_uzivatela'] == "admin" ) {
// -------------------------------------------------------------------------- //
   include_once("definitions.php");
?>


<A HREF="site.php?x=92" TARGET="_self"><B>Admin_Pocitadlo</B></A><BR>
<A HREF="site.php?x=91" TARGET="_self"><B>Admin_Forum</B></A><BR>
<A HREF="site.php?x=93" TARGET="_self"><B>Admin_Bleskovky</B></A><BR>
<A HREF="site.php?x=94" TARGET="_self"><B>Admin_Obrazky</B></A><BR>
<A HREF="site.php?x=90" TARGET="_self"><B>Admin_Clanky</B></A><BR>
<A HREF="site.php?x=89" TARGET="_self"><B>Admin_User_Counter</B></A><BR>
<BR><A HREF="site.php?x=98" TARGET="_self"><B>Odhlasit sa</B></A><BR>
<? 
// -------------------------------------------------------------------------- //
    echo "<BR><B>meno:</B> ".$_SESSION['meno_uzivatela'];
    echo "<BR><B>prava:</B> ".$_SESSION['typ_uzivatela'];
  }
  
// -------------------------------------------------------------------------- //  
    if ( $_SESSION['typ_uzivatela'] == "moderator" ) {
// -------------------------------------------------------------------------- //
?>

<A HREF="site.php?x=92" TARGET="_self"><B>Admin_Pocitadlo</B></A><BR>
<A HREF="site.php?x=91" TARGET="_self"><B>Admin_Forum</B></A><BR>
<A HREF="site.php?x=94" TARGET="_self"><B>Admin_Obrazky</B></A><BR>
<A HREF="site.php?x=90" TARGET="_self"><B>Admin_Clanky</B></A><BR>
<A HREF="site.php?x=93" TARGET="_self"><B>Admin_Bleskovky</B></A><BR>
<BR><A HREF="site.php?x=98" TARGET="_self"><B>Odhlasit sa</B></A><BR>
<? 
// -------------------------------------------------------------------------- //
    echo "<BR><B>meno:</B> ".$_SESSION['meno_uzivatela'];
    echo "<BR><B>prava:</B> ".$_SESSION['typ_uzivatela'];
  }
  
  

// -------------------------------------------------------------------------- //
?>

