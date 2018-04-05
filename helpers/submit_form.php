
<?php

$name=stripslashes($_POST["name"]);
$company=stripslashes($_POST["company"]);
$email=stripslashes($_POST["email"]);
$phone=stripslashes($_POST["phone"]);
$icecream=stripslashes($_POST["icecream"]);

$secret="6LcS5EAUAAAAACzKTsePxvKJhXYD8mcneE_WALcE";

$response=$_POST["captcha"];

$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");

$captcha_success=json_decode($verify);

if ($captcha_success->success==false) {

  //This user was not verified by recaptcha.

 

}

else if ($captcha_success->success==true) {

  //This user is verified by recaptcha

 $to = 'daniel@danieltclancy.com';
            $subject = 'Portfolio Website Contact Submission';
            $htmlContent = "
                <h1>Contact Form Detais:</h1>
                <p><b>Name: </b>".$name."</p>
                <p><b>Company: </b>".$company."</p>
                <p><b>Email: </b>".$email."</p>
				<p><b>Phone: </b>".$phone."</p>
				<p><b>Icecream Flavor: </b>".$icecream."</p>
            ";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
            //send email
            mail($to,$subject,$htmlContent,$headers);
	
}



?>