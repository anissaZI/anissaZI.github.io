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
if(!empty($_POST["send"])) {
	$name = $_POST["userName"];
	$email = $_POST["userEmail"];
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	$toEmail = "zanissa1304@gmail.com";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	if(mail($toEmail, $subject, $content, $mailHeaders)) {
	    $message = "Your contact information is received successfully.";
	    $type = "success";
	}
}
require_once "contact-view.php";
?>

	<div id="inhalt">

		<p>Vielen Dank für Ihre Nachricht. Wir werden Ihnen so schnell wie möglich antworten.</p>

	</div>

        </div>
    </body>
</html>
