
<?php
$dbname = "test";
$ip = getenv("REMOTE_ADDR");

$cn = mysqli_connect("localhost", "test", "t3st3r123") or die("Ei saanud serveriga ühendust");
$db = mysqli_select_db($cn, $dbname) or die("Couldn't Access database: $dbname");

$sql = "SELECT IP_aadress FROM ttilk__IP WHERE IP_aadress = \"$ip\"";


$result = mysqli_query($cn, $sql) or die("Couldn't execute query");

$num = mysqli_num_rows($result);


if( $num == 0 ) {
	//Create a uniqe stats entry:
	$sql = "INSERT INTO ttilk__IP(IP_aadress, hits) VALUES(\"$ip\", 1)";
	//
	$result = mysqli_query($cn, $sql) or die("Couldn't update stats");


}

$sql = "UPDATE ttilk__IP SET hits = hits + 1 WHERE IP_aadress = \"$ip\"";
//$sql = "UPDATE hits SET count = count + 1";
$result = mysqli_query($cn, $sql) or die("Couldn't update hits");

$hits = "SELECT hits FROM ttilk__IP WHERE IP_aadress=\"$ip\"";
$result = mysqli_query($cn, $hits) or die("Couldn't update hits");
$tulemus = mysqli_fetch_assoc($result);
$tulemus2 =implode($tulemus);


echo "olete sellelt Ip aadressilt ". $ip . " juba meid külastanud ". $tulemus2. " korda.";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>praktikum 07.05.2016</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>

<img src="itklogo.png" alt="ITK logo">




<p>
    <a href="http://validator.w3.org/check?uri=referer">
        <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
    </a>
</p>



</body>
</html>
