<?php
	echo ("CHECK");
	include("../NexmoPHP/NexmoAccount.php");
	include("../NexmoPHP/NexmoReceipt.php");
	include("../NexmoPHP/NexmoMessage.php");


	$sms = new NexmoMessage('1c7512a7', 'd77fd951');

	$tmp = $sms->inboundText();
	if ($tmp === false) {
		echo ("WHOA");
	}
	echo ("Huh $tmp");

    if ($sms->inboundText()) {
         $sms->reply('You said: ' . $sms->text);
    }
?>