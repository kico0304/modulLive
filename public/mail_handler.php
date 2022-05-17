<?php

if(isset($_POST) && !empty($_POST)){

	$email_to =  $_POST['mailto'];
	$email_subject = "Poruka sa sajta";
	$getCountry = $_POST['disCountry'];
	// data collector from form inputs
	$getName = $_POST['name'];
	//$getSurname = $_POST['surname'];
	$getEmail = $_POST['email'];
	$getSubject = $_POST['subject'];
	$getPhone = $_POST['phone'];
	$getMessage = $_POST['message'];
	$getDate = date("d-m-Y");
	$getTime = date("h-i-s");

	//$filename = 'orders.txt'; // text document for storing data

	//$full_content1 = 'IME I PREZIME: '.$getName;
	//$full_content3 = 'EMAIL: '.$getEmail;
	//$full_content4 = 'TELEFON: '.$getPhone;
	//$full_content2 = 'NASLOV: '.$getSubject;
	//$full_content5 = 'PORUKA: '.$getMessage;
	//$full_content6 = 'DATUM: '.$getDate;
	//$full_content7 = 'VRIJEME: '.$getTime;

	//$separator = '-------------NEXT ORDER-------------';

	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	$phone_exp = '/^[1-9][0-9]*$/';

	// writing data in .txt file
	//file_put_contents($filename, $full_content1.PHP_EOL, FILE_APPEND);
	//file_put_contents($filename, $full_content2.PHP_EOL, FILE_APPEND);
	//file_put_contents($filename, $full_content3.PHP_EOL, FILE_APPEND);
	//file_put_contents($filename, $full_content4.PHP_EOL, FILE_APPEND);
	//file_put_contents($filename, $full_content5.PHP_EOL, FILE_APPEND);
	//file_put_contents($filename, $full_content6.PHP_EOL, FILE_APPEND);
	//file_put_contents($filename, $full_content7.PHP_EOL, FILE_APPEND);
	//file_put_contents($filename, $separator.PHP_EOL, FILE_APPEND);

	$email_message = "Podaci korisnika ispod:\r\n";

	function clean_string($string) {
		$bad = array("content-type","bcc:","to:","cc:");
		return str_replace($bad,"",$string);
	}

	$email_message .= "Zemlja distributera: ".clean_string($getCountry)."\r\n";
	$email_message .= "Ime i prezime: ".clean_string($getName)."\r\n";
	$email_message .= "Email: ".clean_string($getEmail)."\r\n";
	$email_message .= "Naslov: ".clean_string($getSubject)."\r\n";
	$email_message .= "Telefon: ".clean_string($getPhone)."\r\n";
	$email_message .= "Poruka: ".clean_string($getMessage)."\r\n";

	//print_r($email_message);

	$headers = 'From: '.$getEmail."\r\n".
	'Reply-To: '.$getEmail."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	mail($email_to, $email_subject, $email_message, $headers);

	$message = "Vaša poruka je poslata. Hvala!";
	echo $message;

}

?>