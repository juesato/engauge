<?php
include("../NexmoPHP/NexmoMessage.php");
require("../includes/functions.php");

$data = array_merge($_GET, $_POST);
error_log(var_export($data, true));


$sms = new NexmoMessage('1c7512a7', 'd77fd951');

    if ($sms->inboundText()) {
        // $sms->reply('You said: ' . $sms->text);
        // sleep(2);
    	$raw_text = $sms->text;
        // $sms->reply($raw_text);
        // sleep(2);
    	$number = $sms->from;
        // $sms->reply($number);
        // sleep(2);

        $pieces = explode(" ", $raw_text, 2);

        $class = query("SELECT * FROM classes WHERE abbrev = ?", $pieces[0]);
        $asker = query("SELECT * FROM users WHERE phone = ?", $number);

        // $sms->reply($class[0]["id"] . "some stuff" . $asker[0]["id"]);
        // sleep(2);
        
        

        if (count($class) == 1 && count($asker) == 1 && count($pieces) == 2)
        {
            $class_id = $class[0]["id"];
            $asker_id = $asker[0]["id"];
            // sleep(2);

            //$sms->reply($class_id . "class then asker" . $asker_id);
            //sleep(2);

            $date = new DateTime();
            $parse_date = $date->format('Y-m-d H:i:s');
            //$sms->reply("about to query");
            //sleep(2);

            //$sms->reply($pieces[1]);
            //sleep(2);

            if (query("INSERT INTO questions (class_id, asker_id, topic, datetime, phone_reply) VALUES (?, ?, ?, ?, ?)", $class_id, $asker_id, $pieces[1], $parse_date, 1) === false)
            {
                $sms->reply("You messed up");
            }

            else
            {
                //$sms->reply("u really fucked up");
            }
        }

	}

?>