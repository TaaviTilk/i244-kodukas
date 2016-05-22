<?php


function connect_db(){
	global $connection;
	$host = 'localhost';
        $user = 'root';
        $pass = 'Password'; //'t3st3r123'
        $db = 'test';
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)
	global $connection;
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['user']) && isset($_POST['pass'])) {
			if ($_POST['user'] == "" || $_POST['pass'] == "") {
					$errors[] = "Palun sisestage mõlemad, nii kasutajanimi kui ka parool";
			} else 
			{ $kasutajanimi = mysqli_real_escape_string($connection,htmlspecialchars($_POST['user']));
		      $salasona = mysqli_real_escape_string($connection,htmlspecialchars($_POST['pass']));
			$query = mysqli_query($connection, "SELECT id FROM ttilk__kylastajad WHERE username = '".$kasutajanimi."' AND passw = SHA1('".$salasona."')") or die("Päringut ei toimunud");

	if (mysqli_num_rows($query) >= 1) {
		$id = mysqli_fetch_assoc($query)['id'];
		$_SESSION['user'] = $id;
		$_SESSION['username'] = $kasutajanimi;
		header("Location: loomaaed.php");
			} else {
		$errors[] = "Vale parool või kasutajanimi"; }
	}
	}			

}
	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	// siia on vaja funktsionaalsust
    
    	if (!isset($_SESSION['user'])) {

				header("Location: loomaaed.php?page=login");

	}
	global $puurid, $connection;
	$sql= "SELECT DISTINCT puur FROM ttilk__loomaaed";
	$result = mysqli_query($connection, $sql) or die("$sql- ".mysqli_error($connection));
	while ($rida = mysqli_fetch_assoc($result)){
		$sql2 = "SELECT * FROM `ttilk__loomaaed` WHERE puur=".  mysqli_real_escape_string($connection, $rida["puur"]); //.$rida["puur"] - siin on mingi jama, sellega ei leia
		$res2 = mysqli_query($connection, $sql2) or die("$sql2 - ".mysqli_error($connection));
		while($loomarida = mysqli_fetch_assoc($res2)) {
			$puurid[$rida["puur"]][]=$loomarida;
		}		
	}
	include_once('views/puurid.html');
	
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	if(!empty($_SESSION["user"])){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			// postitus on tehtud
			if(in_array("", $_POST) || $_FILES["liik"]["error"] > 0 ){
				$errors[] = "Mingi väli jäi postitamisel tühjaks või on faili üleslaadimisel tekkinud viga.";
				include_once('views/loomavorm.html');
			}else{
				// kõik ok, laeme faili üles ja teeme kirje tabelisse
				connect_db();
				upload("liik");
				$query = "INSERT INTO ttilk__loomaaed (NIMI, PUUR, LIIK) 
							VALUES ('"
								.mysqli_real_escape_string($GLOBALS['connection'], $_POST["nimi"])."', '"
								.mysqli_real_escape_string($GLOBALS['connection'], $_POST["puur"])."', '"
								."pildid/".$_FILES["liik"]["name"].
									"');";
								
				$result = mysqli_query($GLOBALS['connection'], $query) or die("$query - ".mysqli_error($GLOBALS['connection']));
				echo "Uus kirje loodud: " . mysqli_insert_id($GLOBALS['connection']) . "Värskendan lehte 3 sekundi pärast.";
				header("refresh:3; url=loomaaed.php?page=loomad");
			}// if
		}else{
			include_once('views/loomavorm.html');
		}// if $_SERVER	
	}else{
		header("Location: loomaaed.php?page=login");
	}// if !empty
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$test = explode(".", $_FILES[$name]["name"]); 
	$extension = end($test);

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>