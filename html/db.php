<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
 <HEAD>
   <STYLE TYPE="text/css">
    body {background-color: #0093DD;
          background-image: url("pics/site/bkgrnd.jpg");
          background-position: absolute;
          background-repeat:repeat-y;                   
          background-attachment:scroll;                  /*fixed; scroll; */
         }
   </STYLE>
  <LINK REL="stylesheet" TYPE="text/css" HREF="style.css">
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1250">
  <TITLE>W.E.N.O. C.R.E.W.</TITLE>
 </HEAD>
<BODY>
DB:
<?php

include_once ("definitions.php");
$connId = mysqli_connect(SQL_HOST, SQL_USERNAME, SQL_PASSWORD, SQL_DBNAME);

mysql_query("DROP TABLE news");
mysql_query("DROP TABLE forum");
mysql_query("DROP TABLE counter");
mysql_query("DROP TABLE clanky");
mysql_query("DROP TABLE pictures");

/******************************************************************************/
mysql_query("CREATE TABLE forum(
               id   bigint(20),
               time int not null,
               nick varchar(20),
               text text,
               ip   varchar(15)
            )") 
or die("Nelze vykonat definiciní dotaz: <BR>" . mysql_error());

mysql_query("ALTER TABLE `forum` ADD PRIMARY KEY (`id`)")
or die("Nelze vykonat definiciní dotaz: <BR>" . mysql_error());

mysql_query("ALTER TABLE `forum` CHANGE `id` `id` bigint(20) unsigned not null auto_increment ")
or die("Nelze vykonat definiciní dotaz: <BR>" . mysql_error());

mysql_query("ALTER TABLE `forum` ADD INDEX ( `time` )")
or die("Nelze vykonat definiciní dotaz: <BR>" . mysql_error());
/******************************************************************************/

/******************************************************************************/
mysql_query("CREATE TABLE counter(
               nr   bigint(20),
               time int not null,
               ip   varchar(15)
            )") 
or die("Nelze vykonat definiciní dotaz: <BR>" . mysql_error());

mysql_query("ALTER TABLE `counter` ADD PRIMARY KEY (`nr`)")
or die("Nelze vykonat definicní dotaz: <BR>" . mysql_error());

mysql_query("ALTER TABLE `counter` CHANGE `nr` `nr` bigint(20) unsigned not null auto_increment ")
or die("Nelze vykonat definiciní dotaz: <BR>" . mysql_error());

mysql_query("ALTER TABLE `counter` ADD INDEX ( `time` )")
or die("Nelze vykonat definiciní dotaz: <BR>" . mysql_error());
/******************************************************************************/

/******************************************************************************/
mysql_query("create table news(
               nr bigint(20),
               time text,
               text text
            )")
or die("Neda sa vytvorit tabulka NEWS!!! <BR>". mysql_error());

mysql_query("ALTER TABLE `news` ADD PRIMARY KEY (`nr`)")
or die("Nelze vykonat definicní dotaz: <BR>" . mysql_error());

mysql_query("ALTER TABLE `news` CHANGE `nr` `nr` bigint(20) unsigned not null auto_increment ")
or die("Nelze vykonat definiciní dotaz: <BR>" . mysql_error());
/******************************************************************************/

/******************************************************************************/
mysql_query("
               create table `pictures` (
                 id          bigint(20)    not null,
                 main_class  varchar(128)  not null,
                 sub_class   varchar(128)  not null,
                 author      varchar(128)  not null,
                 name        varchar(128)  not null,
                 description text,
                 date        int(11),
                 destination text          not null,
                 size        int           not null
               )
           ")
or die("Error: " .mysql_error());

mysql_query("alter table `pictures` add primary key (`id`)")
or die("Error: " .mysql_error());

mysql_query("alter table `pictures` change `id` `id` bigint(20) unsigned not null auto_increment")
or die("Error: " .mysql_error());

mysql_query("alter table `pictures` add index (`author`)")
or die("Error: " .mysql_error());

mysql_query("alter table `pictures` add index (`date`)")
or die("Error: " .mysql_error());

//mysql_query("alter table `pictures` add fulltext (`description`)")
//or die("Error: " .mysql_error());
/******************************************************************************/



/******************************************************************************/
mysql_query("
               create table `clanky` (
                 id          bigint(20)    not null,
                 date        int(11),
                 nadpis      varchar(128)  not null,
                 text_small  text,
                 text_big    text,
                 autor       varchar(128)  not null,
                 pic         BLOB,
                 precitane   int(4)
               )
           ")
or die("Error: " .mysql_error());

mysql_query("alter table `clanky` add primary key (`id`)")
or die("Error: " .mysql_error());

mysql_query("alter table `clanky` change `id` `id` bigint(20) unsigned not null auto_increment")
or die("Error: " .mysql_error());

mysql_query("alter table `clanky` add index (`date`)")
or die("Error: " .mysql_error());

//mysql_query("alter table `clanky` add fulltext (`text_big`)")
//or die("Error: " .mysql_error());
/******************************************************************************/


/******************************************************************************/
mysql_query(" create table `users` (
                 id          bigint(4)    not null,
                 nick        varchar(128)  not null,
                 pass        varchar(128)  not null,
                 type        varchar(128)  not null
               )
           ")
or die("Error: " .mysql_error());

mysql_query("alter table `users` add primary key (`id`)")
or die("Error: " .mysql_error());

mysql_query("alter table `users` change `id` `id` bigint(4) unsigned not null auto_increment")
or die("Error: " .mysql_error());

mysql_query("alter table `users` add index (`nick`)")
or die("Error: " .mysql_error());
/******************************************************************************/


/******************************************************************************/
mysql_query(" create table `user_login` (
                 id          int(5)        not null,
                 time        int(11)       not null,
                 user_id     varchar(128)  not null,
                 ip          varchar(128)  not null
               )
           ")
or die("Error: " .mysql_error());

mysql_query("alter table `user_login` add primary key (`id`)")
or die("Error: " .mysql_error());

mysql_query("alter table `user_login` change `id` `id` bigint(4) unsigned not null auto_increment")
or die("Error: " .mysql_error());
/******************************************************************************/


//mysql_query("DROP TABLE news");
//mysql_query("DROP TABLE forum");
//mysql_query("DROP TABLE counter");
//mysql_query("DROP TABLE clanky");
//mysql_query("DROP TABLE pictures");

?> 

</BODY>

</HTML>
