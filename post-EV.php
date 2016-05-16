
<?php
#ini_set('display_errors', 'On');
  $to = $_POST["email"];
  $header = 'MIME-Version: 1.0' . "\r\n";
  $header .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
  $header .= "From:".$_POST["name"]." <".$_POST["email"].">"."\r\n";
  $header .= "Blah: Another Field"."\r\n";
  $header .= "CustomField.{EIN}:".$_POST["ein"].""."\r\n";
  $header .= "CustomField.{Address}:".$_POST["address"].""."\r\n";
  $header .= "CustomField.{CellPhone}:".$_POST["phone"].""."\r\n";
  $header .= "CustomField.{City}:".$_POST["city"].""."\r\n";
  $header .= "CustomField.{County}:".$_POST["county"].""."\r\n";
  $header .= "CustomField.{FirstName}:".$_POST["name"].""."\r\n";
  $header .= "CustomField.{LastName}:".$_POST["l_name"].""."\r\n";
  $header .= "X-Priority: 3\r\n";
  $header .= "X-Mailer: PHP". phpversion()."\r\n";
  $subject = $_POST["subject"];
  $message = wordwrap($_POST["body"], 70, "\r\n");
  mail($to,$subject,$message,$header);
?>
Message Sent
<br>
<br>
Find the content of your email below
<br>
<hr>
To:  <?php echo $to; ?><br>
From: <?php echo $to; ?><br>
Headers:<br>
<?php echo $header; ?>
<br>
<br>
Subject: <?php echo $subject; ?><br>
Message: <br><?php echo $message; ?><br>
