<?php
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
        $message = "GET andmed puuduvad";
    }
    
    
    
    switch ($message) {
    case "pealeht":
        require("pealeht.html");
        break;
    case "galerii":
        require("galerii.html");
        break;
    case "vote":
        require("vote.html");
        break;
    case "tulemus":
        require("tulemus.html");
        break;
    default:
        require("pealeht.html");
        break;
    }
    
    
    require_once('foot.html');
?>