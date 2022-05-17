<?php

if(isset($_POST) && !empty($_POST)){

	$email_to =  $_POST['mailto'];
	$myHtml = $_POST['hiddenSelectedInfo'];
	$email_subject = "Poruka sa sajta";
	//$getCountry = $_POST['disCountry'];
	// data collector from form inputs
	$getName = $_POST['name'];
	//$getSurname = $_POST['surname'];
	$getEmail = $_POST['email'];
	$getSubject = $_POST['subject'];
	$getPhone = $_POST['phone'];
	$getMessage = $_POST['message'];
	$getDate = date("d-m-Y");
	$getTime = date("h-i-s");

	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	$phone_exp = '/^[1-9][0-9]*$/';

	//$email_message = "Podaci korisnika ispod:\r\n";

	function clean_string($string) {
		$bad = array("content-type","bcc:","to:","cc:");
		return str_replace($bad,"",$string);
	}
	$email_message .= "Ova poruka je poslana sa kofiguratora.<br>";
	$email_message .= "Korisnik je izabrao: ".clean_string($myHtml)."<br>"."\r\n";
	$email_message .= "Ime i prezime: ".clean_string($getName)."<br>"."\r\n";
	$email_message .= "Email: ".clean_string($getEmail)."<br>"."\r\n";
	$email_message .= "Naslov: ".clean_string($getSubject)."<br>"."\r\n";
	$email_message .= "Telefon: ".clean_string($getPhone)."<br>"."\r\n";
	$email_message .= "Poruka: ".clean_string($getMessage)."<br>"."\r\n";

	//print_r($email_message);

	$headers = 'From: '.$getEmail."\r\n".
	$headers .= "MIME-Version: 1.0" . "\r\n"; 
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
	'Reply-To: '.$getEmail."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	mail($email_to, $email_subject, $email_message, $headers);

	$message = "Vaša poruka je poslata. Hvala!";
	echo $message;

}

?>