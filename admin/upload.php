<?php
// Verzeichnis für Bilder-Upload

// an da finale Verzeichnis anpassen!

$target = $_SERVER['DOCUMENT_ROOT']."/dev/upload/";
$target = $target . basename( $_FILES['document']['name']);
$document=($_FILES['document']['name']);

// Upload gesendet?
if (isset ($_POST["upload"])) {
	// Dokument vorhanden?
	if (empty($document)) {$fehler .= "<div class='alert red margin-tb-15 w50'>Keine Datei ausgewählt</div>";}
	// Dateityp XML?
	/*
	if (!empty($document)) {
		$type = explode(".",$document);
		if(strtolower(end($type)) != 'xml') {$fehler .= "<div class='alert red margin-tb-15 w50'>Bitte nur XML-Dateien hochladen</div>";}
	}
	*/
		//  Nur wenn KEINE Fehler vorliegen, hier weiter
		if (empty($fehler)) {
			if ($document!=NULL) {
				if(move_uploaded_file($_FILES['document']['tmp_name'], $target)) {
				//Tells you if its all ok
				$confirmation = "<div class='alert green'>Upload  erfolgreich</div>";
				}
				else {
				//Gives and error if its not
				$confirmation = "<div class='alert red'>Sorry, there was a problem uploading your file.</div>";
				}
			}
		}
		// Abbruch
		else {$confirmation = $fehler;}
}
?>