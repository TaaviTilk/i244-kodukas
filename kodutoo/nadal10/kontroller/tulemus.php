<h3>Valiku tulemus</h3>

<?php
    if (empty($_POST) && empty($_SESSION["votet_vor"])) {
        echo "Jätsite valiku tegemata!";
    } else {
        if((isset($_POST['pilt'])&& $_POST['pilt']!="" && empty($_SESSION["votet_vor"]))) {
            $_SESSION["votet_vor"] = $_POST['pilt'];
            echo "Tänan valiku nr ". $_SESSION["votet_vor"] ." tegemise eest <br>";
            echo "Valitud pilt <br>";
            echo '<img src="pildid/nameless' . $_SESSION["votet_vor"] . '.jpg" alt="pilt ' . $_SESSION["votet_vor"]. '" height="100" />';
                        
        }  else {
            echo "TEIST KORDA VALIDA EI SAA! <br> Teie valik oli nr ". $_SESSION["votet_vor"] ."<br>";
            echo '<img src="pildid/nameless' . $_SESSION["votet_vor"] . '.jpg" alt="pilt ' . $_SESSION["votet_vor"] . '" height="100" />';
        }
    }
?>
<br>
<a href="?page=lopeta">LÕPETA SESSIOON!</a>    

