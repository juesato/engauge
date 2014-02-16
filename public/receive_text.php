<?php
include("../NexmoPHP/NexmoMessage.php");

$data = array_merge($_GET, $_POST);
error_log(var_export($data, true));


$sms = new NexmoMessage('1c7512a7', 'd77fd951');

    if ($sms->inboundText()) {
         //$sms->reply('You said: ' . $sms->text);
    	$raw_text = $sms->text;
	}

?>