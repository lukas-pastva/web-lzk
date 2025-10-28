<?php
  function f($limit){

    include_once("definitions.php");
    if (! $limit) { $limit = COUNTER_POCET_ZOBRAZOVANYCH; }
    ?>
    <DIV CLASS="stranka">
      <H3>Admin_pocitadlo</H3>
      <HR>
    <?php
    // -------------------------------------------------------------------------- //
    if ( ( $_SESSION['typ_uzivatela'] == "admin" ) || ( $_SESSION['typ_uzivatela'] == "moderator" )  ) {
    // -------------------------------------------------------------------------- //  

        $counter=mysql_query("SELECT * FROM counter ORDER BY nr DESC");

        //Vypis zoznamov stranok
        ?>
         <DIV CLASS="admin_msg">
          <DIV CLASS="clanok_autor">
           <CENTER>
        <?php
        for ($x = COUNTER_POCET_ZOBRAZOVANYCH; ($x-COUNTER_POCET_ZOBRAZOVANYCH) < mysql_affected_rows($link); $x+=COUNTER_POCET_ZOBRAZOVANYCH){
          $nr+=1;
          if ( $limit != $x ){
            echo "\r\n\t<A HREF=\"site.php?x=92&limit=".$x."\"><B>".$nr."</B></A>";
          } else{
            echo "\r\n\t[".$nr."]";
          }
        }
        ?>
           </CENTER>
          </DIV>
         </DIV>
         <BR>
        <?php
        
        for ($i = 0; $i < $limit; $i++){
          if ($counter_array = mysql_fetch_array($counter)){
            if ($i >= ($limit - COUNTER_POCET_ZOBRAZOVANYCH)){
              echo "\r\n\t<DIV CLASS=\"admin_msg\">";
              echo "\r\n\t\t\t nr:   <B>".$counter_array['nr']."</B>&nbsp;&nbsp;&nbsp;&nbsp;
                    time: <B>".date('d.n.Y H:i:s', ($counter_array['time']))."</B>&nbsp;&nbsp;&nbsp;&nbsp;
                    ip:   <B>".$counter_array['ip']."</B><BR>".
                    "<B>more</B>:".gethostbyaddr($counter_array['ip'])."</DIV><BR>";
            }
          } 
        }
    // -------------------------------------------------------------------------- //
    } else { echo "Na tuto stranku nemate opravneny pristup"; }
    // -------------------------------------------------------------------------- //  
    ?>
     </DIV>
    <?php
  }
?>
