<?php 
require_once("head.html");
    $pildid=array(
	"pildid/nameless1.jpg",
	"pildid/nameless2.jpg",
	"pildid/nameless3.jpg",
	"pildid/nameless4.jpg",
	"pildid/nameless5.jpg",
	"pildid/nameless6.jpg");
?>
	<h3>Valiku tulemus</h3>
<?php
    
    if (isset($_GET['pilt'])&& $_GET['pilt']!=""){
        echo "Tänan valiku tegemise eest";
    } else{
        echo "Palun valige pilt";
    }
?>
<?php
	require_once('foot.html');
?>