      <?
      

      
      //**************************************************************************************
      if ($x != null){
      
        if ($x == "1"){?>
        
          <DIV CLASS="obrazok_zorad">
            <FORM ACTION="site.php?x=<? echo $odkaz; ?>" METHOD="post">
              <B>Zoradit podla:</B><BR>
              <SELECT NAME="order_by">
               <OPTION SELECTED VALUE="1">Mena ...A-Z
               <OPTION VALUE="2">Mena ...Z-A
               <OPTION VALUE="3">Datumu 0-9
               <OPTION VALUE="4">Datumu 9-0
              </SELECT>
              <INPUT TYPE="submit" VALUE=">">
            </FORM>
          </DIV>
          <BR>
          <?
          
          $vyberAll = psw_mysql_query("SELECT * FROM pictures WHERE sub_class = '".$sub_class."' ORDER BY author ASC");
          
          if ($vyberAll->num_rows > 0) {
              while($vyber = $vyberAll->fetch_assoc()) {
          
              ?>
              
              <DIV CLASS="obrazok">
               <DIV CLASS="obrazok_1">
                <DIV CLASS="obrazok_nazov">
                 <B><? echo $i.": ".$vyber["author"] ?></B>
                </DIV>
                <DIV CLASS="obrazok_popis">
                 <B>Datum:    </B><? echo date('d-m-Y', ($vyber['date']))?><BR>
                 <B>Popis:    </B><? echo $vyber["description"] ?><BR>
                </DIV>
                <DIV CLASS="obrazok_pic">
                 <DIV CLASS="cursor"  ONCLICK="window.open('viewer.php?sub_class=<? echo $vyber['sub_class']; ?>&amp;order_by=4&amp;id=<? echo $vyber['id']; ?>', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=1000,height=600,left=10,titlebar=0');" TITLE="click"><IMG SRC="<? echo $vyber["destination"]."small/".$vyber["name"]?>" WIDTH="133" HEIGHT="100" BORDER="1"></DIV>
                </DIV>
               </DIV>
               
              </DIV>
              <?
            }
          } 
        }
    
        if ($x == "2"){?>
        
          <DIV CLASS="obrazok_zorad">
            <FORM ACTION="site.php?x=<? echo $odkaz; ?>" METHOD="post">
              <B>Zoradit podla:</B><BR>
              <SELECT NAME="order_by">
               <OPTION VALUE="1">Mena ...A-Z
               <OPTION SELECTED VALUE="2">Mena ...Z-A
               <OPTION VALUE="3">Datumu 0-9
               <OPTION VALUE="4">Datumu 9-0
              </SELECT>
              <INPUT TYPE="submit" VALUE=">">
            </FORM>
          </DIV>
          <BR>
          <?
          
          $vyberAll = psw_mysql_query("SELECT * FROM pictures WHERE sub_class = '".$sub_class."' ORDER BY author DESC");
          
          if ($vyberAll->num_rows > 0) {
              while($vyber = $vyberAll->fetch_assoc()) {
                   
              ?>
              
              <DIV CLASS="obrazok">
               <DIV CLASS="obrazok_1">
                <DIV CLASS="obrazok_nazov">
                 <B><? echo $i.": ".$vyber["author"] ?></B>
                </DIV>
                <DIV CLASS="obrazok_popis">
                 <B>Datum:    </B><? echo date('d-m-Y', ($vyber['date']))?><BR>
                 <B>Popis:    </B><? echo $vyber["description"] ?><BR>
                </DIV>
                <DIV CLASS="obrazok_pic">
                 <DIV CLASS="cursor"  ONCLICK="window.open('viewer.php?sub_class=<? echo $vyber['sub_class']; ?>&amp;order_by=4&amp;id=<? echo $vyber['id']; ?>', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=1000,height=600,left=10,titlebar=0');" TITLE="click"><IMG SRC="<? echo $vyber["destination"]."small/".$vyber["name"]?>" WIDTH="133" HEIGHT="100" BORDER="1"></DIV>
                </DIV>
               </DIV>
             
              </DIV>
              <?
            }
          }  
        }
    
        if ($x == "3"){?>
        
          <DIV CLASS="obrazok_zorad">
            <FORM ACTION="site.php?x=<? echo $odkaz; ?>" METHOD="post">
              <B>Zoradit podla:</B><BR>
              <SELECT NAME="order_by">
               <OPTION VALUE="1">Mena ...A-Z
               <OPTION VALUE="2">Mena ...Z-A
               <OPTION SELECTED VALUE="3">Datumu 0-9
               <OPTION VALUE="4">Datumu 9-0
              </SELECT>
              <INPUT TYPE="submit" VALUE=">">
            </FORM>
          </DIV>
          <BR>
          <?
          $vyberAll = psw_mysql_query("SELECT * FROM pictures WHERE sub_class = '".$sub_class."' ORDER BY author DESC");
          
          if ($vyberAll->num_rows > 0) {
              while($vyber = $vyberAll->fetch_assoc()) {
                  
                   
              ?>
              
              <DIV CLASS="obrazok">
               <DIV CLASS="obrazok_1">
                <DIV CLASS="obrazok_nazov">
                 <B><? echo $i.": ".$vyber["author"] ?></B>
                </DIV>
                <DIV CLASS="obrazok_popis">
                 <B>Datum:    </B><? echo date('d-m-Y', ($vyber['date']))?><BR>
                 <B>Popis:    </B><? echo $vyber["description"] ?><BR>
                </DIV>
                <DIV CLASS="obrazok_pic">
                 <DIV CLASS="cursor"  ONCLICK="window.open('viewer.php?sub_class=<? echo $vyber['sub_class']; ?>&amp;order_by=4&amp;id=<? echo $vyber['id']; ?>', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=1000,height=600,left=10,titlebar=0');" TITLE="click"><IMG SRC="<? echo $vyber["destination"]."small/".$vyber["name"]?>" WIDTH="133" HEIGHT="100" BORDER="1"></DIV>
                </DIV>
               </DIV>
              
              </DIV>
              <?
            }
          }  
        }
    
        if ($x == "4"){?>
        
          <DIV CLASS="obrazok_zorad">
            <FORM ACTION="site.php?x=<? echo $odkaz; ?>" METHOD="post">
              <B>Zoradit podla:</B><BR>
              <SELECT NAME="order_by">
               <OPTION VALUE="1">Mena ...A-Z
               <OPTION VALUE="2">Mena ...Z-A
               <OPTION VALUE="3">Datumu 0-9
               <OPTION SELECTED VALUE="4">Datumu 9-0
              </SELECT>
              <INPUT TYPE="submit" VALUE=">">
            </FORM>
          </DIV>
          <BR>
          <?
          $vyberAll = psw_mysql_query("SELECT * FROM pictures WHERE sub_class = '".$sub_class."' ORDER BY author DESC");
          
          if ($vyberAll->num_rows > 0) {
              while($vyber = $vyberAll->fetch_assoc()) {
                   
              ?>
              
              <DIV CLASS="obrazok">
               <DIV CLASS="obrazok_1">
                <DIV CLASS="obrazok_nazov">
                 <B><? echo $i.": ".$vyber["author"] ?></B>
                </DIV>
                <DIV CLASS="obrazok_popis">
                 <B>Datum:    </B><? echo date('d-m-Y', ($vyber['date']))?><BR>
                 <B>Popis:    </B><? echo $vyber["description"] ?><BR>
                </DIV>
                <DIV CLASS="obrazok_pic">
                 <DIV CLASS="cursor"  ONCLICK="window.open('viewer.php?sub_class=<? echo $vyber['sub_class']; ?>&amp;order_by=4&amp;id=<? echo $vyber['id']; ?>', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=1000,height=600,left=10,titlebar=0');" TITLE="click"><IMG SRC="<? echo $vyber["destination"]."small/".$vyber["name"]?>" WIDTH="133" HEIGHT="100" BORDER="1"></DIV>
                </DIV>
               </DIV>
             
              </DIV>
              <?
            }
          }  
        }
    
    } else {?>
    
          <DIV CLASS="obrazok_zorad">
            <FORM ACTION="site.php?x=<? echo $odkaz; ?>" METHOD="post">
              <B>Zoradit podla:</B><BR>
              <SELECT NAME="order_by">
               <OPTION VALUE="1">Mena ...A-Z
               <OPTION VALUE="2">Mena ...Z-A
               <OPTION VALUE="3">Datumu 0-9
               <OPTION SELECTED VALUE="4">Datumu 9-0
              </SELECT>
              <INPUT TYPE="submit" VALUE=">">
            </FORM>
          </DIV>
          <BR>
          <?
          $vyberAll = psw_mysql_query("SELECT * FROM pictures WHERE sub_class = '".$sub_class."' ORDER BY author DESC");
          
          if ($vyberAll->num_rows > 0) {
              while($vyber = $vyberAll->fetch_assoc()) {
                  
                   
              ?>
              
              <DIV CLASS="obrazok">
               <DIV CLASS="obrazok_1">
                <DIV CLASS="obrazok_nazov">
                 <B><? echo $i.": ".$vyber["author"] ?></B>
                </DIV>
                <DIV CLASS="obrazok_popis">
                 <B>Datum:    </B><? echo date('d-m-Y', ($vyber['date']))?><BR>
                 <B>Popis:    </B><? echo $vyber["description"] ?><BR>
                </DIV>
                <DIV CLASS="obrazok_pic">
                 <DIV CLASS="cursor"  ONCLICK="window.open('viewer.php?sub_class=<? echo $vyber['sub_class']; ?>&amp;order_by=4&amp;id=<? echo $vyber['id']; ?>', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=1000,height=600,left=10,titlebar=0');" TITLE="click"><IMG SRC="<? echo $vyber["destination"]."small/".$vyber["name"]?>" WIDTH="133" HEIGHT="100" BORDER="1"></DIV>
                </DIV>
               </DIV>
                
              </DIV>
               <?
            }
          } 
        }
      ?>
