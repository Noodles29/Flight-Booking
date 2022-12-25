<?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function book_flight(){
    extract($_POST);
    foreach ($name as $k => $value) {
        $data = " flight_id = $flight_id ";
        $data .= " , name = '$name[$k]' ";
        $data .= " , address = '$address[$k]' ";
        $data .= " , contact = '$contact[$k]' ";
        $data .= " , email = '$email[$k]' ";
        $save[] = $conn->query("INSERT INTO booked_flight set ".$data);
    }
    if(isset($save))
        return 1;
//         $mail = new PHPMailer(true);
//         //print_r($mail);
//         //select value
//         try {
//             //Server settings
//             $mail->SMTPDebug = 2;                                 // Enable verbose debug output
//             $mail->isSMTP();                                      // Set mailer to use SMTP
//             $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
//             $mail->SMTPAuth = true;                               // Enable SMTP authentication
//             $mail->Username = 'hvha9408@gmail.com';                 // SMTP username
//             $mail->Password = 'hluuoyxufvmeenqw';                           // SMTP password
//             //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//             $mail->SMTPOptions = array(
//                 'ssl' => array(
//                     'verify_peer' => false,
//                     'verify_peer_name' => false,
//                     'allow_self_signed' => true
//                 )
//             );
//             $mail->Port = 587;                                    // TCP port to connect to
         
//             //Recipients
//             $mail->setFrom('hvha9408@gmail.com', 'CloudTravel');
//             $mail->addAddress($email);     // Add a recipient
//             // $mail->addAddress('20521255@gm.uit.edu.vn');      // Name is optional
//             //$mail->addReplyTo('info@example.com', 'Information');
//             // $mail->addCC('cc@example.com');
//             // $mail->addBCC('bcc@example.com');
         
//             //Attachments
//             $mail->addAttachment("assets/img/ticket.png");         // Add attachments
//             // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
         
//             //Content
//             $mail->isHTML(true);                                  // Set email format to HTML
//             $mail->Subject = 'Ticket';
//             $mailBody =' Hi ' + $name + "\t tks for using our website here is your ticket" +"your phone number is"+ $contact;
//             $mail->Body = $mailBody;    
//             // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
         
//             $mail->send();
//             echo 'Message has been sent';
//         } catch (Exception $e) {
//             echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
//         }
 }
?>
       <!-- <script>
        alert("gui mail thanh cong");
         window.location.href = 'index.php?page=home';
        
       </script>
   -->