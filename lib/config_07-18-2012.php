<?php
ob_start();
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if($_SERVER['HTTP_HOST']=="localhost" || $_SERVER['HTTP_HOST']=="server" || $_SERVER['HTTP_HOST']=="santosh") {
    // Config setting for localhost.
    define('DBSERVER',"localhost");

    define('DBNAME',"tour_and_travel");
    define('DBUSER',"root");
    define('DBPASS',"");
    
    define('SITE_URL',"http://www.elegantjourneys.co/");
    //define(SITE_FS_PATH,"C:/Program Files/xampp/htdocs/trop/");
    //define(SITE_PATH,"http://umit/diggclone/website/");
    define('SERVER_LOCAL',1);
    define('SITE_NAME',"http://www.elegantjourneys.co/");
    
} else {


    // Config setting for live server.
    define(DBSERVER,"dbeji.db.9187892.hostedresource.com");
    define(DBNAME,"dbeji");
    define(DBUSER,"dbeji");
    define(DBPASS,"Raja@8048");
    define(SITE_URL,"http://www.elegantjourneys.co/");
    define(SITE_PATH,"http://www.elegantjourneys.co/");
    define(SITE_NAME,"http://www.elegantjourneys.co/"); 
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

define('series1','GOLDEN TRIANGLE TOURS');
define('series2','NORTH INDIA TOURS');
define('series3','RAJASTHAN TOURS');
define('series4','NORTH INDIA + KERALA TOURS');
define('series5','ALL INDIA TOURS');
define('series6','NORTH INDIA + WILDLIFE');
define('series7','LUXURY TRAIN TOURS');
define('series8','BEST SELLERS');
?>
