    <?php
    
    if (isset($_POST['text'])&& $_POST['text']!=""){
        $message = htmlspecialchars($_POST['text']);
    } else{
        $message = "Alla kirjuta vajadusel uus text";
    }
    if (isset($_POST['taust_varv'])){
        $taust_varv = htmlspecialchars($_POST['taust_varv']);
    }else{
        $taust_varv = "#ffffff";
    }
    if (isset($_POST['text_varv'])){
        $text_varv = htmlspecialchars($_POST['text_varv']);
    }else{
        $text_varv = "#000000";
    }
    if (isset($_POST['piirjoon_laius'])){
        $piirjoon_laius = htmlspecialchars($_POST['piirjoon_laius']);
    }else{
        $piirjoon_laius = "2";
    }
    if (isset($_POST['piirjoone_tyyp'])){
        $piirjoone_tyyp = htmlspecialchars($_POST['piirjoone_tyyp']);
    }else{
        $piirjoone_tyyp = "solid";
    }
    if (isset($_POST['piirjoone_varv'])){
        $piirjoone_varv = htmlspecialchars($_POST['piirjoone_varv']);
    }else{
        $piirjoone_varv = "#00FA9A";
    }
    if (isset($_POST['piirjoon_raadius'])){
        $piirjoon_raadius = htmlspecialchars($_POST['piirjoon_raadius']);
    }else{
        $piirjoon_raadius = "30";
    }
    ?>
