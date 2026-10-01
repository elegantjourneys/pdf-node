<?php
ob_start();
//error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '0');
session_start();
if($_SERVER['HTTP_HOST']=="localhost" || $_SERVER['HTTP_HOST']=="server" || $_SERVER['HTTP_HOST']=="santosh") {
    // Config setting for localhost.
   /* define('DBSERVER',"localhost");

    define('DBNAME',"tour_and_travel");
    define('DBUSER',"root");
    define('DBPASS',"");
    
    define('SITE_URL',"http://www.elegantjourneys.com/");
    //define(SITE_FS_PATH,"C:/Program Files/xampp/htdocs/trop/");
    //define(SITE_PATH,"http://umit/diggclone/website/");
    define('SERVER_LOCAL',1);
    define('SITE_NAME',"http://www.elegantjourneys.co/");*/

	define(DBSERVER,"localhost");
    define(DBNAME,"wpjo274s_dbeji");
    define(DBUSER,"wpjo274s_rakesh");
    define(DBPASS,"rimjhim##1234");
    define(SITE_URL,"http://www.elegantjourneys.com/");
    define(SITE_PATH,"http://www.elegantjourneys.com/");
    define(SITE_NAME,"http://www.elegantjourneys.com/"); 
    define(SERVER_LOCAL,0);
    
} else {


    // Config setting for live server.
    define(DBSERVER,"localhost");
    define(DBNAME,"wpjo274s_dbeji");
    define(DBUSER,"wpjo274s_rakesh");
    define(DBPASS,"rimjhim##1234");
    define(SITE_URL,"http://www.elegantjourneys.com/");
    define(SITE_PATH,"http://www.elegantjourneys.com/");
    define(SITE_NAME,"http://www.elegantjourneys.com/"); 
    define(SERVER_LOCAL,0);
}

// Database Connection Establishment String
mysql_connect(DBSERVER,DBUSER,DBPASS) or die("cannot connect");

// Database Selection String
mysql_select_db(DBNAME) or die("error in selecting database");


define('PAGESIZE',25);

include("db.class.php");



$obj=new DB(DBNAME,DBSERVER,DBUSER,DBPASS);
define('SITE_TITLE','Elegant Journeys - india tours | tour india | india tours | travel in india | trip to india | tours of india | india tour packages | india travel agents |  elegantjourneys | elegant journeys | elegant journeys india');

define('series2','Golden Triangle Tours (Delhi, Agra-Taj Mahal, Jaipur)');
define('seriesd2','We offer the best deals in holiday & vacation tour packages to popular tourist destinations in India. Tours to Delhi, Agra and Jaipur (also known as Golden Triangle Tours) are few popular India Tour Packages.');
define('series3','RAJASTHAN TOURS');
define('seriesd3','We offer great deals for popular Tour and Travel packages to Rajasthan. Tours usually begin in either Delhi or Mumbai and include popular places such as Jaipur, Udaipur and Jodhpur.');
define('series4','NORTH INDIA + KERALA TOURS');
define('seriesd4','This section offers best deals for tour packages of North India and Kerala. Tours usually begin in either Delhi or Mumbai and include popular places in Kerala such as Cochin, Alleppey Backwaters Houseboat cruise and Kumarakom.');
define('series5','NORTH INDIA + VARANASI TOURS');
define('seriesd5','This section offers the best deals to popular tourist destinations of North India (Delhi, Agra, Jaipur and Udaipur) Khajuraho and Varanasi.');
define('series6','NORTH INDIA + WILDLIFE TOURS');
define('seriesd6','We offer great deals for popular Tour and Travel packages to Rajasthan. Tours usually begin in either Delhi or Mumbai and include popular places such as Jaipur, Udaipur and Jodhpur.');
define('series7','BHUTAN TOURS');
define('seriesd7','We offer great deals for popular Tour and Travel packages to Bhutan. Tours usually begin in either Paro or Thimpu and include popular places such as Punakha, Trongsa &amp; Bumthang.');
define('series8','BEST SELLERS');
define('seriesd8','We offer great deals for popular Tour and Travel packages to Rajasthan. Tours usually begin in either Delhi or Mumbai and include popular places such as Jaipur, Udaipur and Jodhpur.');

/*
	variable written by rakesh
*/
define('WEBROOT','http://www.elegantjourneys.com/');
define('BASEPATH',$_SERVER["DOCUMENT_ROOT"].'/');
?>
