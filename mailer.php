 <?php


$error = "";
$name = "";
$email = "";
$message = "";

    
    if(empty($_POST['name'])){
        $error .= "Name is required\n<br>";
    }else{
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)){
            $error .= "Only letters and white space allowed\n<br>";
        }
    }
    
    if(empty($_POST['email'])){
        $error .= "Email is required\n<br>";
    }else{
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error .= "Inavalid email format\n<br>";
        }
    }
    
    if(empty($_POST['message'])){
        $error .= "Message is required\n<br>";
    }else{
        $message = test_input($_POST["message"]);
        $message = wordwrap($message, 70, "\r\n");
    }
    if(empty($error)){
    $subject = "New message from $name";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n"; 
    mail('nilocruz@tabolok.com', $subject, $email_content);
    //header("Location: http://localhost/tabolok/index.html");
    //echo "Message submitted";
     
    }else{
       //header("Location: http://localhost/tabolok/resume.pdf");
        echo $error;
    }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
/*
$name = strip_tags(trim($_POST["name"]));
$name = str_replace(array("\r","\n"),array(" "," "),$name);
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$message = trim($_POST["message"]);

if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)){
    //display error message
}

$message = wordwrap($message, 70, "\r\n");
$subject = "New message from $name";
$headers = "From: $name <$email>";
$email_content = "Name: $name\n";
$email_content .= "Email: $email\n\n";
$email_content .= "Message:\n$message\n"; 

mail('nilocruz@tabolok.com', $subject, $email_content, $headers);
*/
?>