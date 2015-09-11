<?php
// Ordner mit images
$ordner = "upload";
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
	   <img src="<?php echo $ordnerinfo['dirname']."/".$ordnerinfo['basename'];?>" alt="<?php echo $ordnerinfo['filename']; ?>" style="margin-bottom: 15px;max-width:100%;"/>
	</div>
<?php
	};
 };
?>
