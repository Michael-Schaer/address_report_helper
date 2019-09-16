<html>
<head>
	<title>PHP-Test</title>
</head>
<body>
<h1>Info-Mail an Gruppe senden</h1>

<form method="post" action="send_mail.php" id="mail_text">
	<textarea name="mail_content" form="mail_text">
	Hallo

	Die Wohnadresse von Mitglied Bla scheint nicht korrekt zu sein.
	Bitte überprüfe und korrigiere diese.

	MPG
	Safari - IT-Support PBS
	</textarea>

	<?php
		echo '<input type="email" name="mailaddress" value="'.$_POST[mailaddress].'">';
	?>

	<input type="submit" value="Mail senden" />
</form>

<form method="post" action="mail.php"><input type="hidden" name="mailaddress" value="'.$result[2].'" /><input type="submit" />
</body>
</html>
