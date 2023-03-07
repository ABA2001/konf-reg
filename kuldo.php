<?php
use PHPMailer\PHPMailer\PHPMailer;
function VerificationSend(){

    //$email = $_POST['email'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //SMTP Settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "ikt2teszt@gmail.com";//ide jön a küldő Gmail cím
    $mail->Password = "roxptnnlbrhvkcbc";//jelszó
    $mail->Port = 465; //587
    $mail->SMTPSecure = "ssl"; //tls

$email='ikt2teszt@gmail.com';//ide küldi az e-mail-t

//küldendő adatok
$targy="AB Kft konferencia visszaigazolás";
$oldal_cime="AB kft";
$tartalma="

Kedves Vendégünk!
Regisztrációját megkaptunk, 
az alábbi linkrő le tudja tölteni és ki  tudja nyomtatni a belépőkártyáját


Üdvözlettel:
Olly
AB kft Ügyvezető igazgató
mail:olly@ollycicagmbh.de
mail:ikt2teszt@gmail.com
tel:+3670-mégnincs
tel: +3636-836-740


";


    //Email Settings
	//$mail->charSet = "UTF-8";
    $mail->isHTML(true);
    $mail->setFrom($email, $oldal_cime);
    //$mail->addAttachment('uploads/file.tar.gz'); //csatolmány küldése
    $mail->addAddress($email);
    // $email2="72155662823@szily.hu";
    // $mail->addAddress($email2);

    $mail->Subject = $targy;
    $mail->Body =$tartalma;
    $mail->CharSet = 'UTF-8';  //karakterkódolás
    //$mail->send();
	if(!$mail->Send())
{
   echo "Hiba a levél küldésekor. Próbálja újra!";
   exit;
}

echo "Az üzenet sikeresen továbbítva.";
}
//levél küldése
VerificationSend();

       

?>