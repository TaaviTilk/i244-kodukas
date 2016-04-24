<?php
session_start();

require_once("head.html");

    $pildid=array(
	"pildid/nameless1.jpg",
	"pildid/nameless2.jpg",
	"pildid/nameless3.jpg",
	"pildid/nameless4.jpg",
	"pildid/nameless5.jpg",
	"pildid/nameless6.jpg");

    if (isset($_GET['page'])&& $_GET['page']!=""){
        $message = $_GET['page'];
    } else{
        $message = "pealeht";
    }
    
    
    
    switch ($message) {
    case "pealeht":
        require("pealeht.html");
        break;
    case "galerii":
        require("galerii.html");
        break;
    case "vote":
        if(!empty($_SESSION["votet_vor"])){
            require ("tulemus.php");
        }  else {
            require("vote.html");
        }
        break;
    case "tulemus":
        require("tulemus.php");
        break;
    case "lopeta":
        if (isset($_COOKIE[session_name()])) {
 	 setcookie(session_name(), '', time()-42000, '/');
	}
        $_SESSION = array();
	session_destroy();  // kustuta sessioon 
	header("Location: kontroller.php?page=vote");
        
    default:
        require("pealeht.html");
        break;
    }
    
    
    require_once('foot.html');
?>