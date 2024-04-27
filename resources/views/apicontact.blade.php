<?php

require_once('PHPMailer/class.phpmailer.php');
if (!empty($_POST['email']) && isset($_POST['contacter'])) {

    //include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

    $mail             = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host       = "mail46.lwspanel.com"; // SMTP server
    $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
    $mail->SetFrom('mail@e-vidoleservices.com', 'mail');

    $mail->AddAddress('mail@e-vidoleservices.com', 'mail');
    if (isset($_POST['email'])) {
        $mail->AddReplyTo('mail@e-vidoleservices.com', 'mail');
        //$mail->addCC('moucharafamadou0@gmail.com', 'moucharaf');
        $mail->addCC('sidoinea96@gmail.com', 'sidoine');
    }

    //$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
    $mail->Host       = "mail46.lwspanel.com";      // sets GMAIL as the SMTP server
    $mail->Username   = "mail@e-vidoleservices.com";  // GMAIL username
    $mail->Password   = "Sido@@1996";            // GMAIL password
    $mail->Subject    =  $_POST['subject'];
    /*
	if(isset($_POST['email'])){
		$body= 'Message : '.$_POST['message'];	
	}
		

$mail->Body =  $body;*/

    $mail->isHTML(false);
    //Build a simple message body
    $mail->Body = <<<EOT
Email expediteur: {$_POST['email']}
Nom et prenom : {$_POST['name']} 

Message: 

{$_POST['message']}
EOT;

    if (!$mail->Send()) {
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Erreur le message n\'a pas été envoyé.');";
        echo "</script>";
        // $URL = "contacts.php";
        // echo "<script>location.href='$URL'</script>";
    } else {


        echo '<div class=" container row alert alert-success alert-dismissible fade show justify-content-center" role="alert">
                    Merci! Votre message a été envoyé avec succès.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }


    //$URL="contacts.php";
    //echo "<script>location.href='$URL'</script>";

}

?>
<script type="text/javascript">
    $(document).ready(function() {

        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                $(this).remove();
            });
        }, 5000);

    });
</script>