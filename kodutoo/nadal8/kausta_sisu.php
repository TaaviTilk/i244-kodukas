<?php
$dir = "../nadal8"; // kausta nimi, mida avada
$failid = array(); // massiiv, kuhu lisatakse leitud failid
if ($dh = opendir($dir)) { // kui funktsioon opendir vastava sisendiga �nnestub, siis j�ta viide kaustale meelde muutujasse $dh ning l�bi j�rgnev koodiblokk
  while (($file = readdir($dh)) !== false) { // seni, kuni funktsiooniga readdir vastavas kaustas saab k�tte mingi kirje (fail/kaust), salvesta see kirje muutujasse $file ning l�bi j�rgnev koodiblokk
    if(!is_dir($file)) { // juhul, kui saadud kirje ei ole kaust, siis lisa antud kirje failide massiivi
      $failid[] = $file;
      echo "\n";
    }
  }
  closedir($dh); // kui kausta lugemine on l�bi, sulge �hendus kaustaga.
} else { // kui funktsioon opendir luhtub(kaust puudub), siis esita veateade ja l�peta programmi t��
  die("Ei suuda avada kataloogi $dir");
}
print_r($failid);// kuva failide massiivi sisu
?>