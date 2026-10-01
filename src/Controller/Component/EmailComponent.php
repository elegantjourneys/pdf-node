<?php

namespace App\Controller\Component;



use Cake\Controller\Component;

require_once ROOT . DS . 'vendor' . DS . 'PHPMailer' . DS . 'src' . DS . 'PHPMailer.php';

require_once ROOT . DS . 'vendor' . DS . 'PHPMailer' . DS . 'src' . DS . 'SMTP.php';

require_once ROOT . DS . 'vendor' . DS . 'PHPMailer' . DS . 'src' . DS . 'Exception.php';



use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;



class EmailComponent extends Component

{

    public function sendEmail($to, $subject, $body, $from = 'your-email@example.com', $fromName = 'Your Name')

    {

        // Load PHPMailer

        $mail = new PHPMailer(true);



        try {

            // Server settings

            $mail->isSMTP();                                      // Set mailer to use SMTP

            $mail->Host       = 'smtp.gmail.com';               // Specify main and backup SMTP servers

            $mail->SMTPAuth   = true;                             // Enable SMTP authentication

            $mail->Username   = 'sales.elegantjourneys@gmail.com';      // SMTP username

            $mail->Password   = 'xlypwttrxgqdsxqm';                  // SMTP password

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted

            $mail->Port       = 587;                              // TCP port to connect to



            // Recipients

            $mail->setFrom($from, $fromName);

            $mail->addAddress($to);     // Add a recipient

            $mail->addReplyTo('sales2@elegantjourneys.co', 'Elegant Journeys India');



            // Content

            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = $subject;

            $mail->Body    = $body;

            $mail->AltBody = strip_tags($body);                   // Fallback for non-HTML email clients



            // Send mail

            if ($mail->send()) {

                return true; // Email sent successfully

            } else {

                return false; // Failed to send

            }

        } catch (Exception $e) {

            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

        }

    }

	

	public function sendHTMLEmail($to="sales2@elegantjourneys.co", $subject, $htmlContent, $from = 'sales2@elegantjourneys.co', $fromName = 'Elegant Journeys India')

{

    // Load PHPMailer

    $mail = new PHPMailer(true);



    try {

        // Server settings

        $mail->isSMTP();                                      // Set mailer to use SMTP

        $mail->Host       = 'smtp.gmail.com';               // Specify main and backup SMTP servers

		$mail->SMTPAuth   = true;                             // Enable SMTP authentication

		$mail->Username   = 'sales.elegantjourneys@gmail.com';      // SMTP username

		$mail->Password   = 'xlypwttrxgqdsxqm';                  // SMTP password

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted

        $mail->Port       = 587;                              // TCP port to connect to



        // Recipients

        $mail->setFrom($from, $fromName);

        $mail->addAddress($to);                               // Add a recipient

        $mail->addReplyTo('sales2@elegantjourneys.co', 'Elegant Journeys India');

		// BCC recipients
        $mail->addBCC('mr.ujjwal.kumar@gmail.com');
        $mail->addBCC('elegantjourneys02@gmail.com');
        $mail->addBCC('kr.rakesh.sinha7@gmail.com');

        // Content

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;

        $mail->Body    = $htmlContent;                        // HTML body content

        $mail->AltBody = strip_tags($htmlContent);            // Fallback for non-HTML email clients



        // Send mail

        if ($mail->send()) {

            return true; // Email sent successfully

        } else {

            return false; // Failed to send

        }

    } catch (Exception $e) {

        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

    }

}



	

}

