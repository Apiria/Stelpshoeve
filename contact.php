<?php $title = "Contact | De Stelpshoeve"; ?>
<?php include("includes/header.php"); ?>
<?php
$mailResponse = '';
$mailSent = null;

function isAjaxRequest() {
    return (filter_has_var(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH') && 'xmlhttprequest' === strtolower($_SERVER['HTTP_X_REQUESTED_WITH']));
}

/**
 * Simple Contact Form 
 */
if (filter_has_var(INPUT_POST, 'mail_submit')) {
    // Get SwiftMailer
    require 'lib/swift_required.php';

    // Error messages
    $errorMessages = array();

    // Posted variables
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

    if (empty($name)) {
        $errorMessages[] = 'Vul alstublieft uw naam in';
    }

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if (empty($email)) {
        $errorMessages[] = 'Vul alstublieft een geldig e-mail adres in';
    }

    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if (empty($message)) {
        $errorMessages[] = 'Vul alstublieft een vraag in';
    }

    if (!empty($errorMessages)) {
        if (isAjaxRequest()) {
            echo json_encode(array(
                'ret' => false,
                'msgs' => $errorMessages
            ));
            exit;
        } else {
            $mailResponse = $errorMessages;
            $mailSent = 'failed';
        }
    } else {
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
            ->setTo(array('klantenservice@destelpshoeve.nl' => 'De Stelpshoeve'))
            ->setBody($body);

        // Swiftmailer transport using default mail
        $transport = Swift_MailTransport::newInstance();

        // Mailer instance
        $mailer = Swift_Mailer::newInstance($transport);

        // Attempt to send the message
        if ($mailer->send($mailMessage)) {

            $successMessage = 'Contact formulier is sucessvol verzonden!';

            if (isAjaxRequest()) {
                echo json_encode(array(
                    'ret' => true,
                    'msg' => $successMessage
                ));
                exit;
            } else {
                $mailResponse = $successMessage;
                $mailSent = 'success';
            }
        } else {

            $failureMessage = 'Contact formulier kon niet worden verzonden. Probeert u het nog eens of stuur u email naar:klantenservice@destelpshoeve.nl';

            if (isAjaxRequest()) {
                echo json_encode(array(
                    'ret' => false,
                    'msg' => $failureMessage
                ));
                exit;
            } else {
                $mailResponse = $failureMessage;
                $mailSent = 'failed';
            }
        }
    }
}
?>
<div class="content-header">
    <h1>Contact</h1>
</div>
<div class="content cf">
    <p>Vul het onderstaande formulier in en wij nemen zo spoedig mogelijk contact met u op.</p>
    <form method="POST">
<?php if (!empty($mailResponse)): ?>
    <?php if (is_array($mailResponse)): ?>
        <?php foreach ($mailResponse as $m): ?>
                    <div class="<?php echo $mailSent; ?>">
                        <p><?php echo $m; ?></p>
                    </div>
        <?php endforeach; ?>
    <?php else: ?>
                <div class="<?php echo $mailSent; ?>">
                    <p><?php echo $mailResponse; ?></p>
                </div>
    <?php endif; ?>
<?php endif; ?>
        <div class="name">
            <label>Naam:</label>
            <input type="text" id="name" name="name" value="<?php if (isset($name)):echo $name;
endif; ?>"/>
        </div>
        <div class="email">
            <label>Email adres:</label>
            <input type="email" id="email" name="email" value="<?php if (isset($email)):echo $email;
        endif; ?>" />
        </div>
        <div class="question">
            <label class="labelquestion">Uw vraag aan ons:</label>
            <textarea name="message" id="textarea" rows="20" cols="60"><?php if (isset($message)):echo $message;
        endif; ?></textarea>
        </div>
        <div class="submit">
            <input type="submit" id="submit" name="mail_submit" value="verzenden" />
        </div>
    </form>
</div>
<?php include("includes/footer.php"); ?>