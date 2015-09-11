<?php


if ($_POST["killme"]) {

echo '<script type="text/javascript">alert("Hinweis: Das Löschen kann nicht rückgängig gemacht werden!");</script>';

$del_name = $_POST["del_name"];
$path = "../upload/";
		$target = $path.$del_name;
		// See if it exists before attempting deletion on it
		if (file_exists($target)) {
		    unlink($target); // Delete now
		}
		// See if it exists again to be sure it was removed
		if (file_exists($target)) {
		    $confirmation = "Datei konnte nicht gelöscht werden. Bitte wenden Sie sich an den <a href='mailto:manuel.buczka@rub.de?subject=Datei $del_name konnte nicht gelöscht werden'>Administrator</a>.";
		} else {
		    $confirmation = "Datei <em>$del_name</em> wurde gelöscht";
		}
}


// Ordner mit images
$ordner = "../upload";
// Ordner für Vorschau auslesen
$allebilder = scandir($ordner);
foreach ($allebilder as $bild) {
	// Pfad zum Original
	$ordnerinfo = pathinfo($ordner."/".$bild);
	// bestimmte Dateien von der Anzeige ausschließen
	if ($bild != "." && $bild != ".."  && $bild != "_notes" && $ordnerinfo['basename'] != "Thumbs.db" && $bild != ".DS_Store") {
	// Ausgabe der Bilder
	?>
	<div align="center">
	   <img src="<?php echo $ordnerinfo['dirname']."/".$ordnerinfo['basename'];?>" style="margin-bottom: 15px;max-width:100%;" alt="<?php echo $ordnerinfo['filename']; ?>" />
	   <form name="killme" action="index.php" method="POST">
		   <input type="hidden" name="killme" value="1">
		   <input type="hidden" name="del_name" value="<?php echo $ordnerinfo['basename'];?>" />
	   		<button type="submit" class="btn btn-default" style="vertical-align: top;margin-left:20px;">Löschen (kann nicht rückgängig gemacht werden)</button>
	   </form>
	    <div class="line light" style="margin:30px 0;"></div>
	</div>
<?php
	};
 };
?>
