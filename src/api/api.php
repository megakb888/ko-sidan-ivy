<?php
	$data = file_get_contents("php://input");
	$objData = json_decode($data);
	#var_dump($objData);

	foreach($objData as $obj)
	{
		$namn = $obj->namn;
		$email = $obj->email;
		$phone = $obj->phone;
		$message = $obj->meddelande;
	}

	$body = "<table width=\"100%\">
	<table width=\"600\" align=\"center\" bgcolor=\"#ffffff\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><a href=\"#\"><img src=\"https://www.netatonce.se/img/annat/header.gif\" alt=\"netatonce.se\" style=\"display: block; border:none;\" /></a></td></tr></table>
	<table width=\"580\" align=\"center\" bgcolor=\"#ffffff\" cellspacing=\"0\" cellpadding=\"0\"><td style=\"padding: 10px;\"><font style=\"font-family: Arial, sans-serif; font-size: 12px; text-decoration: none; font-style: normal; color: #312D28;\"><p style=\"border-bottom: solid 1px #ededed; padding: 0px 0px 10px 0px;\"><b>KONTAKT VIA HEMSIDAN</b></p><br /><p> Tack för ditt meddelande.<br /><br />Vi kommer att besvara ditt ärende så fort som möjligt.<br /><br />Med V&#228;nliga H&#228;lsningar<br />Net at Once </p></td></table><br />
	<table width=\"600\" align=\"center\" bgcolor=\"#ffffff\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"600\" height=\"6\" bgcolor=\"#006699\" align=\"center\"><font style=\"font-family: Arial, sans-serif; font-size: 12px; text-decoration: none; font-style: normal; color: #000000;\"></font></td></tr></table>
	<table width=\"580\" align=\"center\" bgcolor=\"#ffffff\" cellspacing=\"0\" cellpadding=\"0\"><tr><td valign=\"top\" style=\"padding: 10px;\"><font style=\"font-family: Arial, sans-serif; font-size: 14px; color: #312D28;\"><b> Kund: </b></font><br /><font style=\"font-family: Arial, sans-serif; font-size: 12px; color: #312D28;\">$namn<br />$phone<br /> $email</font></td><td valign=\"top\" style=\"padding: 10px;\"><font style=\"font-family: Arial, sans-serif; font-size: 14px; color: #312D28;\"> <b>Meddelande:</b></font><font style=\"font-family: Arial, sans-serif; font-size: 12px; color: #312D28;\"><br />$message<br /></font></td></tr></table>
	<table width=\"600\" align=\"center\" bgcolor=\"#ffffff\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"600\" height=\"6\" padding-bottom=\"10\" bgcolor=\"#006699\" align=\"center\"><font style=\"font-family: Arial, sans-serif; font-size: 12px; text-decoration: none; font-style: normal; color: #000000;\"></font></td></tr></table>
	<table width=\"600\" align=\"center\" bgcolor=\"#ffffff\" cellspacing=\"0\" cellpadding=\"0\"><tr><td align=\"center\" valign=\"top\" width=\"100%\"><font style=\"font-family:Arial, sans-serif;font-size:12px;font-weight:normal;text-decoration:none;font-style:normal;color:#646464;\">Net at Once Sweden AB, Nygtan 8, 352 33 V&#228;xj&#246;<br />Org.nr: 556506-3491</font></td></tr></table>
	</table>";

	$body2 = "	
	<strong>Namn:</strong> $namn<br />
	<strong>E-post:</strong> $email<br />
	<strong>Telefon:</strong> $phone<br />
	<strong>Meddelande:</strong> $message<br />
	";


	$Name = "NetatOnce - Kontakt via hemsidan";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: ". $Name . " <sales@netatonce.se>\r\n";
	if(mail('sales@netatonce.se', 'Kontakt via hemsidan', $body2, $headers))
	{
		mail($email, 'Tack för ditt meddelande.', $body, $headers);
	}
	
?>