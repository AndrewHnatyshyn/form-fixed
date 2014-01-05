<?php

   //This function is designed to process input data
function process_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}

function phone_check($phone){
    $pattern =" /^[0-9]{3}[0-9]{4}[0-9]{3}$/";
    if(preg_match($pattern, $phone)) {
        return true;
    }else{
        return false;
    }

}

