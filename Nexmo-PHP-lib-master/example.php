<?php



	include ( "NexmoMessage.php" );

	/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('1c7512a7', 'd77fd951'); //login kaixiao2@gmail.com, password: aaaaaa

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( '+16179020747', '14844409618', 'This is your automated reply' );
	// US international numbers have +1 in front

	// Step 3: Display an overview of the message
	echo $nexmo_sms->displayOverview($info);

	// Done!

?>