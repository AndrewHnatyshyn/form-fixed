 <?php
require_once 'controller-form.php';
require_once 'model-form.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Form</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="all"  />
</head>
<body>
<div class="form" id="form">
	<h2>SUBMITION FORM </h2>
            <br><span id="cong"><?php if(isset($co)) {echo $co;} ?></span>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <p>
                <label for="title">*Title:</label>
                <select name="title" id="title">
              
                  <option autofocus value="select">select</option>
                  <option value="Mr" <?php if(isset($_POST['title']) && $_POST['title'] == "Mr")
                        { echo "selected='selected'";  } ?> >Mr</option>';
                   <option value="Mrs" <?php if(isset($_POST['title']) && $_POST['title'] == "Mrs")
                        { echo "selected='selected'";  } ?> >Mrs</option>';
                   

                </select>
                <?php if(!empty($title) && $titleErr === ""){echo "&#10003";};?>
                <span class="error"><?=$titleErr;?></span><br>

            </p>

            <p>
                <label for="f_name">*First name:</label><br>
                <input type="text" name="f_name" id="f_name" title="f_name" value="<?=$f_name;?>">
                <?php if(!empty($f_name) && $F_nameErr === ""){echo "&#10003";};?>
                <br><span class="error"><?=$F_nameErr;?></span><br>


            </p>
            <p>
                <label for="s_name">*Second name:</label><br>
                <input type="text" name="s_name" id="s_name" title="s_name" value="<?=$s_name;?>">
                <?php if(!empty($s_name) && $S_nameErr === ""){echo "&#10003";};?>
                <br><span class="error"><?=$S_nameErr;?></span><br>

            </p>
            <p>
                <label for="email">*Email:</label><br>
                <input type="text" name="email" id="email" value="<?=$email;?>">
                <?php if(!empty($email) && $emailErr === ""){echo "&#10003";};?>
                <br><span class="error"><?=$emailErr;?></span><br>
            </p>
            <p>
                <label for="phone">*Phone:</label><br>
                <input type="phone" name="phone" id="phone" value="<?=$phone;?>">
                <?php if(!empty($phone) && $phoneErr === ""){echo "&#10003";};?>
                <br><span class="error"><?=$phoneErr;?></span><br>

            </p>
            <p>
                <label for="message">Message</label><br>
                <textarea name="message" id="message" ><?=$message;?></textarea>

            </p>
        <br><span id = "req">* indicates a required field</span>
            <p>
                <input type="submit" name="submit" value="Submit" id="submit">
            </p>
        </form>
</div>
</body>
</html>