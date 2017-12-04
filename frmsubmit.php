<!DOCTYPE html>
<html>
<body>

<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "new_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
	


$msg = "এ বছর কুইন্টাল প্রতি ১৫৫০ টাকাতে ধান কিনতে চলেছে রাজ্য সরকার। ধান বিক্রি করতে সত্বর চলে আসুন ধান্য ক্রয় কেন্দ্র/ সমবায় সমিতিতে। ফোন করুন 1963 বা 1800345505";
$message = mb_convert_encoding($msg, 'HTML-ENTITIES', 'UTF-8');



/* Here you need to fetch all data 10K at a time and build following data  call send_sms($post_data) */

/* but before send_sms($post_data) check whtether data is building properly by print_r(post_data) */
$post_data = array(
	"username" => "",
	"password" => "",
	"senderid" => "",
	"smsservicetype" => "",
	"bulkmobno" => $mobile_nos, // 10 K numbers as comma seperated e.g "9477413039,9083055958,9477413037,..."
	"content" => urlencode($message)
);




function send_sms($data) {
	$url = '';
	$fields = '';
	foreach($data as $key => $value) {
		$fields .= $key . '=' . $value . '&';
	}
	rtrim($fields, '&');
	$post = curl_init();
	curl_setopt($post, CURLOPT_URL, $url);
	curl_setopt($post, CURLOPT_POST, count($data));
	curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
	curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($post);
	print_r($result);
	curl_close($post);

}



//post_to_url($post_data);





