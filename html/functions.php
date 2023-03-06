<?php
date_default_timezone_set('UTC');
define("DB_HOST", $_ENV['MYSQL_HOST']);
define("DB_NAME", $_ENV['MYSQL_DATABASE']);
define("DB_USERNAME", $_ENV['MYSQL_USER']);
define("DB_PASSWORD", $_ENV['MYSQL_PASSWORD']);

$connId = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

	/*
	$dbs = psw_mysql_query('SHOW DATABASES');

	if ($dbs->num_rows > 0) {
		while($db = $dbs->fetch_assoc()) {
			print_r($db);
		}
	}
	
	
	psw_mysql_query('use `www-lzk-sk-db`');
	$tables = psw_mysql_query('show tables');
	echo 'tables: ';
	if ($tables->num_rows > 0) {
		while($table = $tables->fetch_assoc()) {
			print_r($table);
		}
	}
*/
function psw_mysql_query($sql, $debug = true){
	global $connId;

	return $connId->query($sql);
}
/**
 * ******************************************************************************
 */

// Funkcia, ktora prida navstevnika stranky do databazy aj s jeho ip a casom navstevy.
function counterWrite()
{
    $ip = $_SERVER["REMOTE_ADDR"];
    $timeLogIn = time();

    $vlozenie = psw_mysql_query("insert into counter (time, ip) values (" . $timeLogIn . ", '" . $ip . "')");
    if ($vlozenie != true) {
        echo "Chyba! : " . mysql_error();
    }
}

/**
 * ******************************************************************************
 */

// Funkcia, ktora precita cislo zo suboru counter.txt a vypise ho(pocet navstevnikov).
function counterRead()
{
    $vyberAll = psw_mysql_query("select count(*) as pocet from counter");
    $vyber = $vyberAll->fetch_assoc();

    $vyber = $vyber["pocet"];

    echo $vyber;
}

/**
 * ******************************************************************************
 */

// F-cia, ktora vypise z databazy spravy, news. :)
function vypisNews()
{
    $vyberAll = psw_mysql_query("select time, text from news order by nr desc");

    if ($vyberAll->num_rows > 0) {
        while ($vyber = $vyberAll->fetch_assoc()) {

            echo "\t<HR><B>" . $vyber['time'] . "</B><BR>&nbsp;<BR>\r\n";
            echo "\t" . $vyber['text'];
        }
    }
}

/**
 * ******************************************************************************
 */

// Funkcia, ktora skontroluje, ci je datum vo formate DD-MM-YYYY
function isvaliddate($date)
{
    if (strlen($date) == 10) {
        $DD = substr($date, 0, 2);
        $pom1 = substr($date, 2, 1);
        $MM = substr($date, 3, 2);
        $pom2 = substr($date, 5, 1);
        $YYYY = substr($date, 6, 4);

        settype($DD, "integer");
        settype($MM, "integer");
        settype($YYYY, "integer");

        if (is_int($DD) && is_int($MM) && is_int($YYYY) && ($pom1 == "-") && ($pom2 == "-")) {
            if (($DD <= '31') && ($DD >= '1') && ($MM <= '12') && ($MM >= '1') && ($YYYY <= '2020') && ($YYYY >= '1951')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/**
 * ******************************************************************************
 */

// Funkcia, ktora premeni dvojite uvodzovky na jednorite
function toSingleAp($text)
{
    $text = ereg_replace("\"", "'", $text);
    return $text;
}

/**
 * ******************************************************************************
 */

// Funkcia, ktora zmeni rozlisenie obrazka a ulozi ho na danu adresu
function changeResolution($src_file, $dest_file, $res_x, $res_y, $quality)
{
    rename($src_file, strtolower($src_file));
    $src = $src_file;
    $dest_big = $filename_norm;

    $src_img = imagecreatefromjpeg($src);
    $size = getimagesize($src);

    $big_height = $size[1] / ($size[0] / 960);
    $big_width = 960;

    $dst_img_big = imageCreateTrueColor($big_width, $big_height);

    imagecopyresized($dst_img_big, $src_img, 0, 0, 0, 0, $big_width, $big_height, $size[0], $size[1]);
    imagejpeg($dst_img_big, $dest_big, 65);
}

?>    
