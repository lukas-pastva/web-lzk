<DIV CLASS="forum forum--fullscreen">
  <DIV CLASS="forum_head">
    <A HREF="site.php?x=31"><B><SPAN CLASS="med">Reaguj!!!</SPAN></B></A>
  </DIV>

  <DIV CLASS="forum_text">
   <A NAME="back"></A>
        <?php
        
         function f($dir){}
           
         //Funkcia, ktora vypise obsah suboru forum.txt aj zvyrazni syntax.
         function vypisForum(){
           $pocet_sprav=0;
           $all_text = psw_mysql_query("select nick, text, time from forum order by id desc");

			if ($all_text->num_rows > 0) {
				while($sprava = $all_text->fetch_assoc()) {
					  echo "\r\n\t<DIV CLASS=\"forum_msg\">";
			             echo "<SPAN CLASS=\"med\">".$sprava["nick"]."</SPAN> ";
			             
			             echo "<FONT COLOR=\"#E6E6E6\">".date('j.n.Y G:i:s', ($sprava['time']))."</FONT><BR>";
			             
			             echo "\r\n\t".$sprava["text"];
			             echo "\r\n\t<HR>\r\n\t</DIV>\r\n";
			             
			             $pocet_sprav++;
				}
			}
			

             echo "\r\n\t<B>Koniec fora</B>";
             while ($i < 68) {echo "&nbsp;"; $i++;}
             echo "<B><A HREF=\"#back\" TITLE=\"Skok na zaciatok.\"><SPAN CLASS=\"small\">Na zaciatok fora</SPAN></A></B><BR>\r\n";
             echo "\r\n\t<FONT COLOR=\"white\">".$pocet_sprav."</FONT>";
           }
      
         vypisForum();
        ?>
  </DIV>
</DIV>
