<?php
include("../NexmoPHP/NexmoMessage.php");

$data = array_merge($_GET, $_POST);
error_log(var_export($data, true));


$sms = new NexmoMessage('1c7512a7', 'd77fd951');

    if ($sms->inboundText()) {
         //$sms->reply('You said: ' . $sms->text);
    	$raw_text = $sms->text;



    	$number = $sms->from;

        $class = query("SELECT * FROM classes WHERE abbrev = ?", $pieces[0]);
        $asker = query("SELECT * FROM users WHERE phone = ?", $number);
        $pieces = explode(" ", $raw_text, 2);

        if (count($class) == 1 && count($asker) == 1 && count($pieces) == 2)
        {
            $class_id = $class["id"];
            $asker_id = $asker["id"];

            $date = new DateTime();
            $parse_date = $date->format('Y-m-d H:i:s');

            if (query("INSERT INTO questions (class_id, asker_id, topic, datetime, phone_reply) VALUES (?, ?, ?, ?, ?, ?)", $class_id, $asker_id, $pieces[1], $parse_date, 1) === false)
            {
                apologize("Holy shit you fucked up bad\n");
            }
        }

	}

?>