<?php
  //session_register('meno_uzivatela');
  //session_register('stav');
include_once("definitions.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
 <HEAD>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y7Z7E75XXP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Y7Z7E75XXP');
</script>
 
   <STYLE TYPE="text/css">
    body {background-color: #B2B2B2;
          background-image: url("pics/site/bkgrnd.png");
          background-position: center;
          background-repeat:repeat-y;                   
          background-attachment:scroll;                  /*fixed; scroll; */
         }
   </STYLE>
   <SCRIPT src="script.js" type=text/javascript></SCRIPT>
  <LINK REL="stylesheet" TYPE="text/css" HREF="style.css">
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1250">
  <LINK REL="shortcut icon" HREF="pics/site/favicon.gif">
  <TITLE>-->Ludia Z Konca<--</TITLE>
 </HEAD>
<BODY>
<DIV CLASS="sajtah">

<DIV CLASS="head">
</DIV>
<?php

$x = $_GET["x"];

       if ($x == 0 ) {$hodn1 = "main";               $hodn2=$_GET['limit'];}
  else if ($x == 1)  {$hodn1 = "clanok";             $hodn2=$_GET["id"];}
  else if ($x == 2)  {$hodn1 = "xtm";                $hodn2=$_POST["order_by"];}
  else if ($x == 10) {$hodn1 = "hip-hop";            $hodn2="";}
  else if ($x == 11) {$hodn1 = "write";              $hodn2=$_POST["order_by"];}
  else if ($x == 12) {$hodn1 = "sketches";           $hodn2=$_POST["order_by"];}
  else if ($x == 13) {$hodn1 = "stickers";           $hodn2=$_POST["order_by"];}
  else if ($x == 20) {$hodn1 = "ex-sports";          $hodn2="";}
  else if ($x == 21) {$hodn1 = "sk8";                $hodn2=$_POST["order_by"];}
  else if ($x == 22) {$hodn1 = "bike";               $hodn2=$_POST["order_by"];}
  else if ($x == 23) {$hodn1 = "snb";                $hodn2=$_POST["order_by"];}
  else if ($x == 30) {$hodn1 = "forum";              $hodn2="";}
  else if ($x == 31) {$hodn1 = "zapisforum";         $hodn2="";}
  else if ($x == 41) {$hodn1 = "dasemolinaxi";       $hodn2=$_POST["order_by"];}
  else if ($x == 42) {$hodn1 = "dasemolina-theend";  $hodn2=$_POST["order_by"];}
  else if ($x == 43) {$hodn1 = "martin";             $hodn2=$_POST["order_by"];}
  else if ($x == 44) {$hodn1 = "jamza";              $hodn2=$_POST["order_by"];}
  else if ($x == 45) {$hodn1 = "hip-hopsummit1";     $hodn2=$_POST["order_by"];}
  else if ($x == 46) {$hodn1 = "hip-hopsummit3";     $hodn2=$_POST["order_by"];}
  else if ($x == 47) {$hodn1 = "notakdavaj3";        $hodn2=$_POST["order_by"];}
  else if ($x == 48) {$hodn1 = "ca2";                $hodn2=$_POST["order_by"];}
  else if ($x == 49) {$hodn1 = "hip-hop_fest";       $hodn2=$_POST["order_by"];}
  else if ($x == 50) {$hodn1 = "ca4";                $hodn2=$_POST["order_by"];}
  else if ($x == 60) {$hodn1 = "haluze";             $hodn2=$_POST["order_by"];}  
  else if ($x == 89) {$hodn1 = "admin_user_counter"; $hodn2="";}
  else if ($x == 90) {$hodn1 = "admin_clanky";       $hodn2=$_GET['limit'];}
  else if ($x == 91) {$hodn1 = "admin_forum";        $hodn2=$_GET['limit'];}
  else if ($x == 92) {$hodn1 = "admin_counter";      $hodn2=$_GET['limit'];}
  else if ($x == 93) {$hodn1 = "admin_news";         $hodn2=$_GET['limit'];}
  else if ($x == 94) {$hodn1 = "admin_pictures";     $hodn2=$_POST["sub_class"];}
  else if ($x == 98) {$hodn1 = "admin_logout";       $hodn2="";}
  else if ($x == 99) {$hodn1 = "admin_login";        $hodn2="";}
  else               {$hodn1 = "main";               $hodn2=""; }

     

?>

<DIV CLASS="counter">
  <?php
   echo "user nr. ";
   $filename = "txt/index.txt";
   counterRead();
  ?>
  
</DIV>

<DIV CLASS="news_head">BLESKOVKY</DIV> 

<DIV CLASS="news">
  <?php
    vypisNews();
  ?>
</DIV>

 
<DIV CLASS="links">
   >>>Odkazy<<<
  <A HREF="http://www.sewer.sk"           TARGET="blank"><IMG SRC="pics/links/sewer.jpg"      BORDER="0" WIDTH="88" TITLE="www.sewer.sk"      ALT="www.sewer.sk"></A>
  <A HREF="http://www.hip-hop.sk"         TARGET="blank"><IMG SRC="pics/links/hiphopsk.gif"   BORDER="0" WIDTH="88" TITLE="www.hip-hop.sk"    ALT="www.hip-hop.sk"></A>
  <A HREF="http://www.90bpm.sk"           TARGET="blank"><IMG SRC="pics/links/90bpm.gif"      BORDER="0" WIDTH="88" TITLE="www.90bpm.sk"      ALT="www.90bpm.sk"></A>
  <A HREF="http://www.artattack.sk"       TARGET="blank"><IMG SRC="pics/links/artattack.gif"  BORDER="0" WIDTH="88" TITLE="www.artattack.sk"  ALT="www.artattack.sk"></A>
  <A HREF="http://www.pd-hip-hop.sk"      TARGET="blank"><IMG SRC="pics/links/pd-hip-hop.gif" BORDER="0" WIDTH="88" TITLE="www.pd-hip-hop.sk" ALT="www.pd-hip-hop.sk"></A>
  <A HREF="http://www.boardlife.sk"       TARGET="blank"><IMG SRC="pics/links/boardlife.jpg"  BORDER="0" WIDTH="88" TITLE="www.boardlife.sk"  ALT="www.boardlife.sk"></A>
  <A HREF="http://www.aerosolart.sk"      TARGET="blank"><IMG SRC="pics/links/aeart.jpg"      BORDER="0" WIDTH="88" TITLE="www.aerosolart.sk" ALT="www.aerosolart.sk"></A>
  <A HREF="http://www.writepower.sk"      TARGET="blank"><IMG SRC="pics/links/writepower.jpg" BORDER="0" WIDTH="88" TITLE="www.writepower.sk" ALT="www.writepower.sk"></A>
  <A HREF="http://www.expn.com"           TARGET="blank"><IMG SRC="pics/links/expn.jpg"       BORDER="0" WIDTH="88" TITLE="www.expn.com"      ALT="www.expn.com"></A>
  <A HREF="http://www.freeride.cz"        TARGET="blank"><IMG SRC="pics/links/freeride.jpg"   BORDER="0" WIDTH="88" TITLE="www.freeride.cz"   ALT="www.freeride.cz"></A>
</DIV>


<DIV CLASS="login">
  <FORM ACTION="site.php?x=99" METHOD="post"> 
   <FIELDSET><LEGEND>Login</LEGEND>
    nick:<BR><INPUT TYPE="text" NAME="nick" SIZE="8">
    heslo:<BR><INPUT TYPE="password" NAME="pass" SIZE="3"><INPUT TYPE="submit" VALUE=".">
   </FIELDSET>
  </FORM>
</DIV>
    
<DIV CLASS="menu">
        
  <DIV CLASS="menu_1" ONCLICK="window.open('site.php?x=0&limit=<?php echo CLANKY_POCET_ZOBRAZOVANYCH; ?>','_self');" ONMOUSEOVER="vis(sub_1, sub_2, sub_3, 0, 0, 0);">
    <IMG BORDER="0" SRC="pics/menu/main/mainshit_norm.png" ONMOUSEOVER="this.src=menu_1_sel.src;" ONMOUSEOUT="this.src=menu_1_norm.src;" ALT="">
  </DIV>

  <DIV CLASS="menu_2" ONCLICK="window.open('site.php?x=10','_self');" ONMOUSEOVER="vis(sub_1, sub_2, sub_3, 1, 0, 0);">
    <IMG BORDER="0" SRC="pics/menu/main/hip-hop_norm.png" ONMOUSEOVER="this.src=menu_2_sel.src;" ONMOUSEOUT="this.src=menu_2_norm.src;" ALT="">
  </DIV>

  <DIV CLASS="menu_3" ONCLICK="window.open('site.php?x=20','_self');" ONMOUSEOVER="vis(sub_1, sub_2, sub_3, 0, 1, 0);">
    <IMG BORDER="0" SRC="pics/menu/main/ex-sports_norm.png" ONMOUSEOVER="this.src=menu_3_sel.src;" ONMOUSEOUT="this.src=menu_3_norm.src;" ALT="">
  </DIV>

  <DIV CLASS="menu_4" ONCLICK="window.open('site.php?x=30','_self');" ONMOUSEOVER="vis(sub_1, sub_2, sub_3, 0, 0, 0);">
    <IMG BORDER="0" SRC="pics/menu/main/forum_norm.png" ONMOUSEOVER="this.src=menu_4_sel.src;" ONMOUSEOUT="this.src=menu_4_norm.src;" ALT="">
  </DIV>

  <DIV CLASS="menu_5" ONMOUSEOVER="vis(sub_1, sub_2, sub_3, 0, 0, 1);">
    <IMG BORDER="0" SRC="pics/menu/main/parties_norm.png" ONMOUSEOVER="this.src=menu_5_sel.src;" ONMOUSEOUT="this.src=menu_5_norm.src;" ALT="">
  </DIV>

  <DIV CLASS="menu_6" ONCLICK="window.open('site.php?x=60','_self');" ONMOUSEOVER="vis(sub_1, sub_2, sub_3, 0, 0, 0);">
    <IMG BORDER="0" SRC="pics/menu/main/haluze_norm.png" ONMOUSEOVER="this.src=menu_6_sel.src;" ONMOUSEOUT="this.src=menu_6_norm.src;" ALT="">
  </DIV>

  <DIV CLASS="menu_7" ONCLICK="window.open('site.php?x=2','_self');" ONMOUSEOVER="vis(sub_1, sub_2, sub_3, 0, 0, 0);">
    <IMG BORDER="0" SRC="pics/menu/main/xtm_norm.png" ONMOUSEOVER="this.src=menu_7_sel.src;" ONMOUSEOUT="this.src=menu_7_norm.src;" ALT="">
  </DIV>

  <DIV class="submenu" ID="submenu_1" ONMOUSEOVER="vis(sub_1, sub_2, sub_3, 1, 0, 0);" ONMOUSEOUT="vis(sub_1, sub_2, sub_3, 0, 0, 0);">
    <DIV CLASS="submenu_1_div" ONCLICK="window.open('site.php?x=11','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">WRITE</DIV>
    <DIV CLASS="submenu_1_div" ONCLICK="window.open('site.php?x=12','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">SKETCHES</DIV>
    <DIV CLASS="submenu_1_div" ONCLICK="window.open('site.php?x=13','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">STICKERS</DIV>
  </DIV>

  <DIV class="submenu" ID="submenu_2" ONMOUSEOVER="vis(sub_1, sub_2, sub_3, 0, 1, 0);" ONMOUSEOUT="vis(sub_1, sub_2, sub_3, 0, 0, 0);">
   <DIV CLASS="submenu_2_div" ONCLICK="window.open('site.php?x=21','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">SKATE</DIV>
   <DIV CLASS="submenu_2_div" ONCLICK="window.open('site.php?x=22','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">BIKE</DIV>
   <DIV CLASS="submenu_2_div" ONCLICK="window.open('site.php?x=23','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">SNB</DIV>
  </DIV>

  <DIV class="submenu" ID="submenu_3" ONMOUSEOVER="vis(sub_1, sub_2, sub_3, 0, 0, 1);" ONMOUSEOUT="vis(sub_1, sub_2, sub_3, 0, 0, 0);">
    <DIV CLASS="submenu_3_div" ONCLICK="window.open('site.php?x=41','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">Da Semolina XI</DIV>
    <DIV CLASS="submenu_3_div" ONCLICK="window.open('site.php?x=42','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">Da Semolina The End</DIV>
    <DIV CLASS="submenu_3_div" ONCLICK="window.open('site.php?x=43','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">Akcia v MT</DIV>
    <DIV CLASS="submenu_3_div" ONCLICK="window.open('site.php?x=44','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">Graffiti jam v ZA</DIV>
    <DIV CLASS="submenu_3_div" ONCLICK="window.open('site.php?x=45','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">Hip-Hop Summit 1</DIV>
    <DIV CLASS="submenu_3_div" ONCLICK="window.open('site.php?x=46','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">Hip-Hop Summit 3</DIV>
    <DIV CLASS="submenu_3_div" ONCLICK="window.open('site.php?x=47','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">No Tak Davaj 3</DIV>
    <DIV CLASS="submenu_3_div" ONCLICK="window.open('site.php?x=48','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">CA underground 2</DIV>
    <DIV CLASS="submenu_3_div" ONCLICK="window.open('site.php?x=50','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');"><b>CA underground 4</b></DIV>
    <DIV CLASS="submenu_3_div" ONCLICK="window.open('site.php?x=49','_self');" ONMOUSEOVER="color(this, '#0093DD');" ONMOUSEOUT="color(this, 'silver');">Orange Hip-Hop Fest</DIV>
  </DIV>
  <script type="text/javascript">
    var sub_1 = document.getElementById("submenu_1");
    var sub_2 = document.getElementById("submenu_2");
    var sub_3 = document.getElementById("submenu_3");
  </script>
  <script type="text/javascript">
    menu_1_norm = new Image();
    menu_1_norm.src = "pics/menu/main/mainshit_norm.png";
    menu_2_norm = new Image();
    menu_2_norm.src = "pics/menu/main/hip-hop_norm.png";
    menu_3_norm = new Image();
    menu_3_norm.src = "pics/menu/main/ex-sports_norm.png";
    menu_4_norm = new Image();
    menu_4_norm.src = "pics/menu/main/forum_norm.png";
    menu_5_norm = new Image();
    menu_5_norm.src = "pics/menu/main/parties_norm.png";
    menu_6_norm = new Image();
    menu_6_norm.src = "pics/menu/main/haluze_norm.png";
    menu_7_norm = new Image();
    menu_7_norm.src = "pics/menu/main/xtm_norm.png";
  </script>
  <script type="text/javascript">
    menu_1_sel =  new Image();
    menu_1_sel.src =  "pics/menu/main/mainshit_sel.png";    
    menu_2_sel =  new Image();
    menu_2_sel.src =  "pics/menu/main/hip-hop_sel.png";  
    menu_3_sel =  new Image();
    menu_3_sel.src =  "pics/menu/main/ex-sports_sel.png"; 
    menu_4_sel =  new Image();
    menu_4_sel.src =  "pics/menu/main/forum_sel.png"; 
    menu_5_sel =  new Image();
    menu_5_sel.src =  "pics/menu/main/parties_sel.png"; 
    menu_6_sel =  new Image();
    menu_6_sel.src =  "pics/menu/main/haluze_sel.png"; 
    menu_7_sel = new Image();
    menu_7_sel.src = "pics/menu/main/xtm_sel.png";
  </script>


</DIV>


<?php

require($hodn1.".php");
  f($hodn2);
  
  ?>
<DIV CLASS="admin">
  <?php  
    require("admin.php");
  ?>
  
</DIV>


</BODY> 
</HTML>
