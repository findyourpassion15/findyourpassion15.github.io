<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->Mailer = "smtp";
echo htmlspecialchars($_SERVER["PHP_SELF"]);
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$nameErr = $emailErr = $queryErr = "";
$name = $email = $query= "";
$n=$e=$q="";
function email_validation($str) { 
    return (!preg_match( 
"^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) 
        ? FALSE : TRUE; 
} 
if($_SERVER["REQUEST_METHOD"]=="POST"){		
	$n = $_POST["name"];
	$e = $_POST["email"];
	$q = $_POST["query"];
	if (!preg_match("/^[a-zA-Z ]*$/",$name) && empty($n)) {
		$nameErr = "<html>
		<script>
		alert('Only letters and white space allowed in Name.');
		window.close();
		</script>
		</html>";
		exit($nameErr);
	}
	else{
		$name= test_input($_POST["name"]);
	}
	if (email_validation($e) && empty($e)) {
		$emailErr = "<html>
		<script>
		alert('Invalid email format.');
		window.close();
		</script>
		</html>";
		exit($emailErr);
	}
	else{
		$email= test_input($_POST["email"]);
	}
	if(empty($q)){
		$queryErr = "<html>
		<script>
		alert('Please input your query.');
		window.close();
		</script>
		</html>";
		exit($queryErr);
	}
	else{
		$query= test_input($_POST["query"]);
	}
}
$file= fopen("queries.t", "a");
fwrite($file,"\nName:".$name."\n");
fwrite($file,"e-mail:".$email."\n");
fwrite($file,"queries:".$query."\n");
fclose($file);
$to=$email;
$headers="From: findyourpassion15@gmail.com";
$subject="Query Support-FYP";
$message="Hey ".$name.",\n\r\n\r"."
We are glad that you took your time to write describe your query to us.\n\r
 We will soon respond to your query within short period of time.\n\r 
 Meanwhile, we will try to resolve your query.\n\r\n\r"."
We appreciate your patience.\n\r\n\r Team,\n\rFYP";
$massage="Hey ".$name.",<br><br>"."
<i>We are glad that you took your time to write us. We will try to resolve your query and also improve ourselves.
Stay tuned until team responds to your query.</i>"."<br><br>
<i>We appreciate your patience.</i><br><br>
<b>Team,<br>
<i>FYP.</i></b>";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "findyourpassion15@gmail.com";
$mail->Password   = "akshar123";
$mail->IsHTML(true);
$mail->AddAddress($to, $name);
$mail->SetFrom("findyourpassion15@gmail.com", "FYP");
$mail->Subject = $subject;
$mail->Body = $massage;
$mail->AltBody = $message;
$mail->send();
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}
echo "<script>window.close();</script>";
?>