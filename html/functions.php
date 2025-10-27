<?php
date_default_timezone_set('UTC');

// Start session if not already active
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// DB config via env; allow both $_ENV and getenv fallback
define("DB_HOST", $_ENV['MYSQL_HOST'] ?? getenv('MYSQL_HOST'));
define("DB_NAME", $_ENV['MYSQL_DATABASE'] ?? getenv('MYSQL_DATABASE'));
define("DB_USERNAME", $_ENV['MYSQL_USER'] ?? getenv('MYSQL_USER'));
define("DB_PASSWORD", $_ENV['MYSQL_PASSWORD'] ?? getenv('MYSQL_PASSWORD'));

$connId = @mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Provide a compatible $link handle for legacy calls
$link = $connId;

// Provide legacy mysql_* compatibility wrappers over mysqli_*
if (!function_exists('mysql_query')) {
    function mysql_query($sql) {
        $c = $GLOBALS['connId'];
        return mysqli_query($c, $sql);
    }
}

if (!function_exists('mysql_error')) {
    function mysql_error() {
        $c = $GLOBALS['connId'];
        return mysqli_error($c);
    }
}

if (!function_exists('mysql_fetch_array')) {
    function mysql_fetch_array($result) {
        return mysqli_fetch_array($result);
    }
}

if (!function_exists('mysql_fetch_assoc')) {
    function mysql_fetch_assoc($result) {
        return mysqli_fetch_assoc($result);
    }
}

if (!function_exists('mysql_num_rows')) {
    function mysql_num_rows($result) {
        return mysqli_num_rows($result);
    }
}

if (!function_exists('mysql_affected_rows')) {
    function mysql_affected_rows($unused_link = null) {
        $c = $GLOBALS['connId'];
        return mysqli_affected_rows($c);
    }
}

if (!function_exists('mysql_real_escape_string')) {
    function mysql_real_escape_string($str) {
        $c = $GLOBALS['connId'];
        return mysqli_real_escape_string($c, $str);
    }
}

// session_register shim (no-op) for legacy code paths
if (!function_exists('session_register')) {
    function session_register($name) {
        // Values are directly assigned to $_SESSION in the code already
        return true;
    }
}

/*
	$dbs = psw_mysql_query('SHOW DATABASES');

	if ($dbs && $dbs->num_rows > 0) {
		while($db = $dbs->fetch_assoc()) {
			print_r($db);
		}
	}

	psw_mysql_query('use `www-lzk-sk-db`');
	$tables = psw_mysql_query('show tables');
	echo 'tables: ';
	if ($tables && $tables->num_rows > 0) {
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
    if ($vlozenie !== true) {
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
    // Replace double quotes with single quotes
    return str_replace('"', "'", $text);
}

/**
 * ******************************************************************************
 */

// Funkcia, ktora zmeni rozlisenie obrazka a ulozi ho na danu adresu
function changeResolution($src_file, $dest_file, $res_x, $res_y, $quality)
{
    // Normalize filename to lowercase on disk; keep track of new path
    $lower_src = strtolower($src_file);
    if ($lower_src !== $src_file) {
        @rename($src_file, $lower_src);
    }

    $src = $lower_src;
    $dest_big = $dest_file;

    $src_img = @imagecreatefromjpeg($src);
    if (!$src_img) {
        return false;
    }
    $size = getimagesize($src);
    if (!$size) {
        return false;
    }

    // Use provided target size, fallback to BIG_PICTURE_WIDTH keeping aspect ratio
    $target_w = (int)($res_x ?: (defined('BIG_PICTURE_WIDTH') ? BIG_PICTURE_WIDTH : 960));
    $target_h = (int)($res_y ?: round($size[1] / ($size[0] / max(1, $target_w))));
    $target_q = (int)($quality ?: (defined('BIG_PICTURE_QUALITY') ? BIG_PICTURE_QUALITY : 70));

    // Maintain aspect ratio based on width
    $big_width = $target_w;
    $big_height = (int)round($size[1] / ($size[0] / max(1, $big_width)));
    $dst_img_big = imagecreatetruecolor($big_width, $big_height);

    imagecopyresampled($dst_img_big, $src_img, 0, 0, 0, 0, $big_width, $big_height, $size[0], $size[1]);
    imagejpeg($dst_img_big, $dest_big, $target_q);

    return true;
}

?>    
