<html>
<head>
	<title>PHP-Test</title>
</head>
<body>
<h1>Info-Mail an Gruppe senden</h1>

<?php
require '../vendor/autoload.php';
use Mailgun\Mailgun;

$mg = Mailgun::create('f8295afcfc44ec0af88d344f45a8af3a-c27bf672-305d27b4'); // For EU servers

// Now, compose and send your message.
// $mg->messages()->send($domain, $params);
$mg->messages()->send('sandbox06d4d0f9aa3e4b88a0c839aeba471302.mailgun.org', [
	'from'    => 'caspar.brenneisen@pbs.ch',
	'to'      => $_POST[mailaddress],
	'subject' => 'MiData Adresse',
	'text'    => $_POST[mail_content]
]);
?>

</body>
</html>
