<?php
include("../NexmoPHP/NexmoMessage.php");

$data = array_merge($_GET, $_POST);
error_log(var_export($data, true));


$sms = new NexmoMessage('1c7512a7', 'd77fd951');

    if ($sms->inboundText()) {
         //$sms->reply('You said: ' . $sms->text);
    	$raw_text = $sms->text;

    	$number = $sms->from;

    	// $pieces = explode(" ", $raw_text, 2);

    	// if (count($pieces) == 2)
    	// {
    	// 	query("INSERT INTO questions (class_id, asker_id, topic, datetime, phone_reply) VALUES (?, ?, ?, ?, ?, ?)", )
    	// }
	}

?>