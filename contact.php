<?php include("includes/header.php"); ?>
<?php

$response = '';

function isAjaxRequest() {
	return (filter_has_var(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH') && 'xmlhttprequest' === strtolower($_SERVER['HTTP_X_REQUESTED_WITH']));
}

/**
 * Simple Contact Form 
 */

if(filter_has_var(INPUT_POST, 'mail_submit'))
{
	// Get SwiftMailer
	require 'lib/swift_required.php';
	
	// Posted variables
	$name	 = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_STRING );
	$email	 = filter_input( INPUT_POST, 'email', FILTER_VALIDATE_EMAIL );
	$message = filter_input( INPUT_POST, 'message', FILTER_SANITIZE_STRING );
	
	// Body of the email message
	$body = "
		A contact form has been submitted:
		
		From   : {$name}\r\n
		Email  : {$email}\r\n
		Message: 
		
		{$message}
	";
	
	// Make a new message
	$mailMessage = Swift_Message::newInstance();
	$mailMessage
		->setSubject('De Stelpshoeve Contact Formulier')
		->setFrom(array('no-reply@destelpshoeve.nl' => 'no-reply De Stelpshoeve'))
		->setTo(array('leon.rowland@gmail.com' => 'De Stelpshoeve' ))
		->setBody($body);
	
	// Swiftmailer transport using default mail
	$transport = Swift_MailTransport::newInstance();
	
	// Mailer instance
	$mailer = Swift_Mailer::newInstance($transport);
	
	// Attempt to send the message
	if($mailer->send($mailMessage)) 
	{
		
		$successMessage = 'Contact formulier is succesvol verzonden!';
		
		if(isAjaxRequest()) 
		{
			echo json_encode(array(
				'ret' => true,
				'msg' => $successMessage
			));
			exit;
		}
		else
		{
			$mailResponse = $successMessage;
			$mailSent = 'success';
		}
		
	} 
	else 
	{
		
		$failureMessage = 'Het contact formulier kon niet worden verzonden. Probeert u het nog eens of stuur uw vraag direct naar: klantenservice@destelpshoeve.nl';
		
		if(isAjaxRequest())
		{
			echo json_encode(array(
				'ret' => false,
				'msg' => $failureMessage
			));
			exit;
		}
		else
		{
			$mailResponse = $failureMessage;
			$mailSent = 'failed';
		}
	}
	
}

?>
<div class="content-header">
    <h1>Contact</h1>
</div>
<div class="content cf">
    <p>vul het onderstaande formulier in en wij nemen zo spoedig mogelijk contact met u op</p>
	<form method="POST">
		<?php if(!empty($mailResponse)): ?>
		<div class="<?php echo $mailSent; ?>">
			<p><?php echo $mailResponse; ?></p>
		</div>
		<?php endif; ?>
		<div class="name">
			<label>Naam:</label>
			<input type="text" id="name" name="name" />
		</div>
		<div class="email">
			<label>Email adres:</label>
			<input type="email" id="email" name="email" />
		</div>
		<div class="question">
			<label class="labelquestion">Uw vraag aan ons:</label>
			<textarea name="message" id="textarea" rows="20" cols="60">Stel hier uw vraag aan ons</textarea>
		</div>
		<div class="submit">
			<input type="submit" id="submit" name="mail_submit" value="verzenden" />
		</div>
	</form>
</div>
    <?php include("includes/footer.php"); ?>