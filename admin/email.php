<?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 

 include('db_connect.php');
 $cats = $conn->query("SELECT * FROM booked_flight where id = ".$_GET['id']);
 $row = $cats->fetch_assoc();

		$mail = new PHPMailer(true);
		// print_r($mail);
		$mail->CharSet = 'UTF-8';
		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'hvha9408@gmail.com';                 // SMTP username
		    $mail->Password = 'xtpeuwdewkejlgjc';                           // SMTP password 
		    $mail->SMTPSecure = 'tls';   
			                         // Enable TLS encryption, `ssl` also accepted
			 $mail->SMTPOptions = array(
			'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
						)
			);
		    $mail->Port = 587;                                    // TCP port to connect to
		 
		    //Recipients
		    $mail->setFrom('hvha9408@gmail.com', 'cloud travel');
		     // Add a recipient
		    $mail->addAddress($row['address']);  
		    // Name is optional
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('stackskill7@gmail.com');
		    // $mail->addBCC('bcc@example.com');
		 
		    //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		    //Content

			$title = "Buying Ticket successfully this is your ticket";
			$body = "<p>Tks ".$row['name']." buying ticket at cloudTravel, you can check your ticket at history. <br> Your ticket id :".$row['id']." </p>";
			$body.="<h4>Ticket info :</h4p>";
			$q = $conn->query("SELECT * FROM flight_list where id = ".$row['flight_id']);
			$row2 = $q->fetch_assoc();
			$body .= 
			"<ul style='border:none ;margin:10px;'>
				<li> Your plane id is ".$row2['plane_no']." </li>
			 	<li> Departure Time At ".$row2['departure_datetime']."</li>            
				<li> Arrival At ".$row2['arrival_datetime']."</li>
				<li>Your phone".$row['contact']."</li>
				</ul>";
	$body .= " Contact us asap if u have problem, Enjoy the flight ";
		    $mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $title;
			$mail->Body = $body;
		    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		 
		    $mail->send();
		    echo 'Message has been sent';

		} catch (Exception $e) {

		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}

?>
       <!-- <script>
        alert("gui mail thanh cong");
         window.location.href = 'index.php?page=home';
        
       </script>
   -->