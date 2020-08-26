<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, width=device-width">
        <title>xy Kirchengemeinde</title>

        <link rel="stylesheet" type="text/css" media="screen" href="stylesheet.css">
        <link rel="stylesheet" href="print.css" type="text/css" media="print">
        <link rel="stylesheet" href="mobil.css" type="text/css" media="screen and (max-device-width: 480px)">
    </head>
    <body>
    <div id="container">
            <header id="kopfleiste">
                <h1>Unsere Kirchengemeinde</h1>
            </header>
            <nav id="menu">
                <ul>
                    <li><a href="index.html">ÜBER UNS</a></li>
                    <li><a href="gottesdienste.html">GOTTESDIENSTE &amp; GEMEINDE</a></li>
                    <li><a href="aktuelles.html">AKTUELLES</a></li>
                    <li><a href="saalvermietung.html">SAALVERMIETUNG</a></li>
                    <li class="current">KONTAKT &amp; IMPRESSUM</li>
                </ul>
            </nav>
            <?php

# mit dieser Funktion löschen wir Zeilenumbrüche; so stellen wir sicher, dass keine weiteren E-Mail-Adressen oder Schadcode eingeschmuggelt werden können
function clear_user_input($value) {
	if (get_magic_quotes_gpc()) $value=stripslashes($value);
	$value= str_replace( "\n", '', trim($value));
	$value= str_replace( "\r", '', $value);
	return $value;
}

$email = $_POST['email'];

### Konfiguration ###
$mailto = "smijay.cowboyking031199@gmail.com"; # die Adresse sollte unbedingt im Code stehen, nicht über das Formular übertragen werden; andernfalls könnten Spammer das Skript nutzen, um beliebige Mails darüber zu verschicken
$mailsubj = "Kontaktanfrage von der Website"; # hier können Sie einen beliebigen Betreff eintragen
### Ende Konfiguration ###

# Angabe des Absenders; ausgelesen aus dem Formular
$mailhead = "From: $email\n"; # manche Hoster überschreiben diese Angabe mit ihrem eigenen Absendernamen
reset ($_POST);

# E-Mail-Text zusammenstellen
$body ="Werte, die von der Website übermittelt wurden:\n";

foreach ($_POST as $key => $value) {
	$key = clear_user_input($key);
	$value = clear_user_input($value);
	if ($key=='extras') {
	    if (is_array($_POST['extras']) ){
            $body .= "$key: ";
            $counter = 1;
            foreach ($_POST['extras'] as $value) {
                if (sizeof($_POST['extras']) == $counter) {
                    $body .= "$value\n";
                    break;
                }
                else {
                    $body .= "$value, ";
                    $counter += 1;
                }
		    }
        }
        else {
            $body .= "$key: $value\n";
        }
	}
	else {
		$body .= "$key: $value\n";
	}
}
# Mail verschicken
mail($mailto, $mailsubj, $body, $mailhead);

?>

	<div id="inhalt">

		<p>Vielen Dank für Ihre Nachricht. Wir werden Ihnen so schnell wie möglich antworten.</p>

	</div>

        </div>
    </body>
</html>
