<?php include 'php.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Siilide muutmine online</title>
    <style type="text/css">
  	table {
	margin: 10px;
	padding: 5px;
        background-color: <?php echo $taust_varv ?>;
        color: <?php echo $text_varv ?>;
        border-width: <?php echo $piirjoon_laius ?>px;
        border-style:<?php echo $piirjoone_tyyp ?>;
        border-color: <?php echo $piirjoone_varv ?>;
        border-radius: <?php echo $piirjoon_raadius ?>px;
	}
    </style>

</head>
<body>
	<table>
	 <tr>
	    <td>
		<?php echo $message ?>
	    <td>
	 <tr>
	</table>
<div>

    <form  action="kommentaar_stiilidega.php" method="post">
        <textarea name="text"><?php echo $message; ?></textarea><br>
        <input type="color" name="taust_varv" value="<?php echo htmlspecialchars($taust_varv); ?>">Tausta värv <br>
        <input type="color" name="text_varv" value="<?php echo htmlspecialchars($text_varv); ?>">Teksti värv <br>
        <input type="number" name="piirjoon_laius" min ="0" max="20" value="<?php echo htmlspecialchars($piirjoon_laius); ?>">Piirjoone laius (0-20) <br>
        <select name="piirjoone_tyyp" value="double">
            <option>double</option>
            <option>dashed</option>
            <option>solid</option>
        </select>
        Piirjoone tüüp <br>
        <input type="color" name="piirjoone_varv" value="<?php echo htmlspecialchars($piirjoone_varv); ?>">Piirjoone värv <br>
        <input type="number" name="piirjoon_raadius" min="0" max="100" value="<?php echo htmlspecialchars($piirjoon_raadius); ?>">Piirjoone raadius<br>
        <br>
        <button type="submit">ESITA</button>
    </form>
    <p></p>
</div>

</body>
</html>
