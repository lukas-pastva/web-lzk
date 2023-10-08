<?
 error_reporting(E_ALL & ~E_WARNING);

 //Pocty sprav zobrazovanych na jednu stranku
 define ("COUNTER_POCET_ZOBRAZOVANYCH"       ,20);
 define ("CLANKY_POCET_ZOBRAZOVANYCH"        ,5 );
 define ("ADMIN_CLANKY_POCET_ZOBRAZOVANYCH"  ,5 );
 define ("ADMIN_FORUM_POCET_ZOBRAZOVANYCH"   ,7 );
 define ("ADMIN_NEWS_POCET_ZOBRAZOVANYCH"    ,7 );
 
 //Velkosti a kvality obrazkov
 define ("CLANOK_PICTURE_WIDTH"              ,70);
 define ("CLANOK_PICTURE_HEIGHT"             ,70);
 define ("CLANOK_PICTURE_QUALITY"            ,90);
 define ("SMALL_PICTURE_HEIGHT"              ,100);
 define ("SMALL_PICTURE_QUALITY"             ,70);
 define ("BIG_PICTURE_WIDTH"                 ,960);
 define ("BIG_PICTURE_QUALITY"               ,70);

 //Rozmery okien
 define ("ADMIN_CLANKY_INSERT_W"             ,600);
 define ("ADMIN_CLANKY_INSERT_H"             ,550);
 define ("ADMIN_CLANKY_UPDATE_W"             ,600);
 define ("ADMIN_CLANKY_UPDATE_H"             ,550);
 define ("ADMIN_CLANKY_UPDATE_IMAGE_W"       ,400);
 define ("ADMIN_CLANKY_UPDATE_IMAGE_H"       ,110);
 define ("ADMIN_DELETE_FROM_DB_W"            ,300);
 define ("ADMIN_DELETE_FROM_DB_H"            ,320);
 define ("ADMIN_FORUM_INSERT_W"              ,300);
 define ("ADMIN_FORUM_INSERT_H"              ,320);
 define ("ADMIN_FORUM_UPDATE_W"              ,300);
 define ("ADMIN_FORUM_UPDATE_H"              ,370);
 define ("ADMIN_NEWS_INSERT_W"               ,200);
 define ("ADMIN_NEWS_INSERT_H"               ,290);
 define ("ADMIN_NEWS_UPDATE_W"               ,200);
 define ("ADMIN_NEWS_UPDATE_H"               ,290);
 define ("ADMIN_PICTURES_INSERT_W"           ,300);
 define ("ADMIN_PICTURES_INSERT_H"           ,330);
 define ("ADMIN_PICTURES_UPDATE_W"           ,300);
 define ("ADMIN_PICTURES_UPDATE_H"           ,300);
 define ("ADMIN_PICTURES_UPDATE_IMAGE_W"     ,400);
 define ("ADMIN_PICTURES_UPDATE_IMAGE_H"     ,110);

include_once ("functions.php");

?>