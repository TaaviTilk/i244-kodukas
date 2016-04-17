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
	<h3>Vali oma lemmik :)</h3>
        <form action="tulemus.php" method="GET">
           <?php foreach($pildid as $key => $pilt): ?>
            <?php $nr= $key+1;
            ?>
		<p>
			<label for="p<?php echo $nr; ?>">
				<img src="<?php echo $pilt; ?>" alt="<?php echo $key; ?>" height="100"/>
			</label>
			<input type="radio" value="<?php echo $nr; ?>" id="p<?php echo $nr; ?>" name="pilt"/>
		</p>
		<?php endforeach; ?>
		<br/>
		<input type="submit" value="Valin!"/>
	</form>
<?php
	require_once('foot.html');
?>