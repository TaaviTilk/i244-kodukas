<!--
Sinu ülesanne

Loo veebilehekülg, mis kuvab kasutajale, mitmendat korda kasutaja lehekülge külastab.

Lahendust mõeldes eelda, et kasutaja brauseris on lubatud nii Javascript kui ka küpsised.-->

<?php

session_set_cookie_params(15);
session_start();

$dbname = "test";
$ip = getenv("REMOTE_ADDR");
$count1 = 0;

$cn = mysqli_connect("localhost", "test", "t3st3r123") or die("Ei saanud serveriga ühendust");
//$cn = mysqli_connect("localhost", "root", "Password") or die("Ei saanud serveriga ühendust");
$db = mysqli_select_db($cn, $dbname) or die("Couldn't Access database: $dbname");



if (empty($_SESSION["esimene"])){
  

$sql = "SELECT IP_aadress FROM ttilk__IP WHERE IP_aadress = \"$ip\"";

$result = mysqli_query($cn, $sql) or die("Couldn't execute query");

$num = mysqli_num_rows($result);

if( $num == 0 ) {
	//Create a uniqe stats entry:
	$sql = "INSERT INTO ttilk__IP(IP_aadress, hits) VALUES(\"$ip\", 1)";
	//
	$result = mysqli_query($cn, $sql) or die("Couldn't update stats");


}



$hits = "SELECT hits FROM ttilk__IP WHERE IP_aadress=\"$ip\"";
$result = mysqli_query($cn, $hits) or die("Couldn't update hits");
$tulemus = mysqli_fetch_assoc($result);
$tulemus2 =implode($tulemus);
$_SESSION["esimene"] =  $tulemus2;

echo "KÜLASTANUD ". $_SESSION["esimene"]. " korda. <br/>";


} else{

           
$sql = "UPDATE ttilk__IP SET hits =".$_SESSION["esimene"]." + 1 WHERE IP_aadress = \"$ip\"";
//$sql = "UPDATE hits SET count = count + 1";
$result = mysqli_query($cn, $sql) or die("Couldn't update hits");

$hits = "SELECT hits FROM ttilk__IP WHERE IP_aadress=\"$ip\"";
$result = mysqli_query($cn, $hits) or die("Couldn't update hits");
$tulemus = mysqli_fetch_assoc($result);
$tulemus2 =implode($tulemus);
echo "KÜLASTANUD ". $tulemus2. " korda. <br/>";
//echo "olete sellelt Ip aadressilt ". $ip . " juba meid külastanud ". $tulemus2. " korda.";
}
?>



