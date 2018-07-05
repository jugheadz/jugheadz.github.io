 <?php

$name = test_input($_POST["name"]);
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  $nameErr = "Only letters and white space allowed"; 
}

//$name = strip_tags(trim(isset($_POST["name"])));
//$name = str_replace(array("\r","\n"),array(" "," "),$name);
$email = filter_var(trim(isset($_POST["email"])), FILTER_SANITIZE_EMAIL);
$message = trim(isset($_POST["message"]));

if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "invalid data input";
}
else{

$message = wordwrap($message, 70, "\r\n");
$subject = "New message from $name";
$headers = "From: $name <$email>";
$email_content = "Name: $name\n";
$email_content .= "Email: $email\n\n";
$email_content .= "Message:\n$message\n"; 

mail('nilocruz@tabolok.com', $subject, $email_content, $headers);
    echo "message submitted";
}
?>