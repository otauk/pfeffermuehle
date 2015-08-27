<?php

var_dump($_POST);

$name =  $_POST["name"];
$vorname = $_POST["vorname"];
$mail = $_POST["mail"];
$nachricht = nl2br($_POST["nachricht"]);

$timestamp = time();
$datum = date("d.m.Y \u\m H:i \U\h\\r", $timestamp);


$sender            = "Hotel Restaurant Pfeffermühle";
$sendermail        = "$absender";
$subject         = "Ihre Anfrage";
$header = 'Content-type: text/html; charset=utf-8' . "\r\n";
$header .= "From: $sender <$sendermail>\r\n";
$header .= "BCC: $absender\r\n";
$header .= "Reply-to: <$sendermail>\r\n";
$header .= "Return-path: <$sendermail>\r\n";
$text = "

<p>
Sehr geehrte/r Herr/Frau $name,
</p>
<p>
Sie haben am $datum folgende Anfrage gestellt:
</p>

<p>
------------------------------------------------
</p>

<p>
$nachricht
</p>

<p>
------------------------------------------------
</p>

<p>
Wir werden uns kurzfristig bezüglich Ihrer Anfrage mit Ihnen in Verbindung setzen.
<p>
Mit freundlichen Grüßen
</p>
Ihr Team vom Hotel Restaurant Pfeffermühle
</p>
";

mail($mail, $subject, $text, $header);

echo "<p>
Sehr geehrte/r Herr/Frau $name,
</p>
<p>
Sie haben am $datum folgende Anfrage gestellt:
</p>

<p>
------------------------------------------------
</p>

<p>
$nachricht
</p>

<p>
------------------------------------------------
</p>

<p>
Wir werden uns kurzfristig bezüglich Ihrer Anfrage mit Ihnen in Verbindung setzen.
<p>
Mit freundlichen Grüßen
</p>
Ihr Team vom Hotel Restaurant Pfeffermühle
</p>";
?>
