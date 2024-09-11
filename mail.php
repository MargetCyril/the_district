<?php

/* require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
//use vendor/phpmailer/phpmailer/src/PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

// On va utiliser le SMTP
$mail->isSMTP();

// On configure l'adresse du serveur SMTP
$mail->Host       = 'localhost';    

// On désactive l'authentification SMTP
$mail->SMTPAuth   = false;    

// On configure le port SMTP (MailHog)
$mail->Port       = 1025;                                   

// Expéditeur du mail - adresse mail + nom (facultatif)
$mail->setFrom('from@thedistrict.com', 'The District Company');

// Destinataire(s) - adresse et nom (facultatif)
$mail->addAddress("client1@example.com", "Mr Client1");

//Adresse de reply (facultatif)
$mail->addReplyTo("reply@thedistrict.com", "Reply");

//CC & BCC
$mail->addCC("cc@example.com");
$mail->addBCC("bcc@example.com");

// On précise si l'on veut envoyer un email sous format HTML 
$mail->isHTML(true);

// On ajoute la/les pièce(s) jointe(s)
$mail->addAttachment('/path/to/file.pdf');

// Sujet du mail
$mail->Subject = 'Test PHPMailer';

// Corps du message
$mail->Body = "On teste l'envoi de mails avec PHPMailer";

// On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
if ($mail){
    try {
        $mail->send();
        echo 'Email envoyé avec succès';
        } catch (Exception $e) {
        echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
        }
    }

 */
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host       = 'localhost';    
$mail->SMTPAuth   = false;    
$mail->Port       = 1025;                                   
$mail->setFrom('from@thedistrict.com', 'The District Company');
$mail->addAddress("$email_client", "$nom_client");
$mail->addReplyTo("reply@thedistrict.com", "Reply"); 
$mail->isHTML(true);
$mail->Subject = 'Confirmation commande';
$mail->Body = "Votre commande de ".$quantite." ".$libelle." à bien été enregistrée";

if ($mail){
    try {
        $mail->send();
        echo 'Email envoyé avec succès';
        } catch (Exception $e) {
        echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
        }
    }
    ?>