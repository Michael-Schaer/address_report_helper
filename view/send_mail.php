<html>
<head>
	<title>PHP-Test</title>
</head>
<body>
<h1>Info-Mail an Gruppe senden</h1>

<?php
require '../vendor/autoload.php';
use Mailgun\Mailgun;

$mg = Mailgun::create('API-KEY'); // For EU servers

// Now, compose and send your message.
// $mg->messages()->send($domain, $params);
$mg->messages()->send('DOMAIN', [
	'from'    => 'caspar.brenneisen@pbs.ch',
	'to'      => $_POST[mailaddress],
	'subject' => 'MiData Adresse',
	'text'    => $_POST[mail_content]
]);
?>

</body>
</html>
