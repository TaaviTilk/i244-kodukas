<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 09.04.2016</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<img src="itklogo.png" alt="ITK logo">


<div class="pealkiri">
    <b>Tudengid</b>
</div>

<table>
    <tr>
        <td> Nimi: </td>
        <td> Taavi Tilk </td>
    </tr>
    <tr>
        <td> Nimi:</td>
        <td> Rain Elken </td>
    </tr>

</table>
<p></p>

<div class="pealkiri">
    <b>I244 Kodutööd</b>
</div>
<br>
<div class="teema">
    <h1>
       Ülesanne 4
    </h1>
    <ol>
        <li>
            <a href="nadal2/tabel.html"> TABEL
                <!--<img src="nadal2/tabelPildis.png" alt="Tabel" height="20" width="20" />//-->
            </a>
        </li>
       </ol>
</div>


<div >
<?php

/* counter */

//opens countlog.txt to read the number of hits
$datei = fopen("countlog.txt","r");
$count = fgets($datei,1000);
fclose($datei);
$count=$count + 1 ;
echo "$count" ;
echo " hits" ;
echo "\n" ;

// opens countlog.txt to change new hit number
$datei = fopen("countlog.txt","w");
fwrite($datei, $count);
fclose($datei);

?>

    </b>
</div>


<p>
    <a href="http://validator.w3.org/check?uri=referer">
        <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
    </a>
</p>



</body>
</html>