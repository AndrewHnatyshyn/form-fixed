<?php
$S_nameErr= $F_nameErr = $emailErr = $titleErr = $phoneErr = "";
$s_name = $f_name = $email = $title = $message = $phone = "";
//$submit = $_POST['submit'];
$form_message="";
$co = "";
 // form validation
if($_SERVER["REQUEST_METHOD"] == "POST"){  
$submit = $_POST['submit'];
    //check title
    if($_POST['title']==="select")
    {$titleErr = "Title is required.";}
    else{ $title  = $_POST['title'];}

    //check FIRST name
    if(empty($_POST['f_name']))
    {$F_nameErr = "Name is required.";}else{

        $f_name = process_input($_POST["f_name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$f_name))
        {
            $F_nameErr = "Only letters and white space allowed";
        }
    }
    //check SECOND name
    if(empty($_POST['s_name']))
    {$S_nameErr = "Name is required.";}else{

        $s_name = process_input($_POST["s_name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$s_name))
        {
            $S_nameErr = "Only letters and white space allowed";
        }
    }

    //Check email
    if (empty($_POST["email"]))
    {$emailErr = "Email is required";}
    else
    {
        $email = process_input($_POST["email"]);
      // check if e-mail address syntax is valid
                if (!preg_match("/([\w\-]+\@[\w\-]+)/",$email))
        {
            $emailErr = "Invalid email format";
        }
    }

    //check phone number
    if (empty($_POST["phone"]))
    {$phoneErr = "Phone is required";}
    else
    {
        $phone = process_input($_POST['phone']);
        // it can process just this  number style "0000000000"
        if(!phone_check($phone)){
            $phoneErr = " Your phone is invalid.";
        }else
        {
            $phone = $_POST['phone'];

        }
        //check message
        if(empty($_POST['message']))
        {$messageErr = "";}
        else{
            $message = process_input($_POST['message']);
        }
        //end script
    }

}
 //form check
if(empty($titleErr) === true &&
   empty($S_nameErr) === true &&
   empty($F_nameErr) === true &&
   empty($emailErr) === true &&
   empty($phoneErr) === true &&
   isset($submit) === true )
{
   //mail form
    $form_message=<<<EOT
    <!DOCTYPE HTML>
<html>
<head>
<style>
body{
background-color:#7CA6CF;
}
.form{
	position:relative;
    left:50%;
    margin-left:-150px;
    width:300px;
    background-color:#CCFFFF;
    padding: 10px;
    border-bottom:5px solid black;border-right:5px solid black;
    border-radius:10px;
    position:relative;
}
</style>
</head>
<body>
<div class="form">
<h2>Thanks for contacting us!</h2>
<ul>
	<li>First name :{$f_name}</li>
	<li>Second name :{$s_name}</li>
	<li>Email :{$email}</li>
	<li>Phone :{$phone}</li>
	<li>Gender :{$title}</li>
	<li>Message :{$message}</li>
</ul>
</div>
</body>
</html>
EOT;
    //end mail form

        //SENDING EMAIL
    mail ('webmaster@localhost', 'Contact form', $form_message,'From: '.$email. "\r\n" . 'Content-type:text/html;charset=windows-1251');
    
    
    $co = "Thanks for contacting us";
    $s_name = $f_name = $email = $title = $message = $phone = $submit = "";
    unset ($_POST['title']);
    unset($_POST['submit']);
    
    
}


