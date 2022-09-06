<?php

require_once('./TCPDF/tcpdf_import.php');

/*---------------- Sent Mail Start -----------------*/


	
	//$email = $_POST['email'];
	$name = $_POST['name'];
	$cusEmail = $_POST['email'];
	$phone = $_POST['phone'];
	$cusMessage = $_POST['message'];
	$email = "tiffany5234345@gamil.com";
	//$deletecode = $_POST['deletecode'];
	mb_internal_encoding("utf-8");
	$to=$email;//填入自己的電子信箱
	$subject=mb_encode_mimeheader("test","utf-8");
	//$attach_filename='chart.png';
	$message = "
		<html>
			<head>
				<title>顧客來信</title>	  
			</head>
			<body>
				Name:$name<br>
				Email Address:$cusEmail<br>
				Phone Number:$phone<br>
				Message:$cusMessage<br>
  			</body>
		</html>
	";
	
	
	// Additional headers
	/*header('Content-Disposition: Attachment;filename=chart.png');
	header('Content-type: image/png');*/
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	$headers[] = 'From: 顧客來信 <birthday@example.com>';
	mail($to, $subject, $message, implode("\r\n", $headers));
	echo "<a href='index.html'>Return Home</a>";

?>
