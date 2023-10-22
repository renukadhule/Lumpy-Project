<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">
   <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body>
   
<div class="header">

   <div class="nav">
      
      <h1> Hi Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      

      <a href="logout.php" class="btn">logout  <i class='fas fa-power-off' style='font-size:20px;color:white;padding-left:6px'></i></a>
   </div>
</div>
   <div class="container">
  <div class="wrapper">
    <h2>User Information </h2>
  </div>
    <form autocomplete="off" class="form" role="form" action="" method="post">
      <div class="form">
      <div class="input_field">
        <label>First Name:</label>
        <input type="text" placeholder="Enter your name" name="first_name">
      </div>
      <div class="input_field">
        <label>Middle Name:</label>
        <input type="text" placeholder="Enter middle_name" name="middle_name">
      </div>
      <div class="input_field">
        <label>Last Name:</label>
        <input type="text" placeholder="Enter last_name" name="last_name">
      </div>
      <div class="input_field">
        <label> Email:</label>
        <input type="text" placeholder="Enter Email"  name="email">
      </div>
      
      <div class="input_field">
        <label>Adharcard:</label>
    <input type="File" id="myfile" name="adharcard" multiple>
      </div>
      <div class="input_field">
        <label>10 MarkSheet:</label>
    <input type="File" id="myfile" name="10marksheet" multiple>
      </div>
      <div class="input_field">
        <label>12 MarkSheet</label>
    <input type="File" id="myfile" name="12marksheet" multiple>
      </div>
      <div class="input_field">
        <label>Birth Certificate</label>
    <input type="File" id="myfile" name="birth" multiple>
      </div>
            <div class="input_field">
        <label>Caste Certificate</label>
    <input type="File" id="myfile" name="caste" multiple>
      </div>
            <div class="input_field">
        <label>Non-Creamylayer Certificate</label>
    <input type="File" id="myfile" name="noncreamy" multiple>
      </div>
            <div class="input_field">
        <label>Nationality and Domicile Certificate</label>
    <input type="File" id="myfile" name="nationality" multiple>
      </div>
      <div class="input_btn">
                      <input type="submit" name="btnsubmit" value="Generate QR Code">
                    </div>
    
    </div>
</form>
<?php


                  if (isset($_POST["btnsubmit"])) {
                    $first_name = $_POST["first_name"];
                    $midle_name = $_POST["middle_name"];
                    $last_name = $_POST["last_name"];
                    $email = $_POST["email"];
                    $adharcard = $_FILES["adharcard"];
                    $marksheet10 = $_FILES["10marksheet"];
                    $marksheet12 = $_FILES["12marksheet"];
                    $birth = $_FILES["birth"];
                    $caste = $_FILES["caste"];
                    $noncreamy = $_FILES["noncreamy"];
                    $nationality = $_FILES["nationality"];
                  }
                  include "phpqrcode/qrlib.php";
                  $PNG_TEMP_DIR = 'temp/';
                  if (!file_exists($PNG_TEMP_DIR))
                      mkdir($PNG_TEMP_DIR);

                  $filename = $PNG_TEMP_DIR . 'test.png';

                  if (isset($_POST["btnsubmit"])) {

                  $codeString = $_POST["first_name"] . "\n";
                  $codeString = $_POST["middle_name"] . "\n";
                  $codeString .= $_POST["last_name"] . "\n";
                  $codeString .= $_POST["email"] . "\n";
                  $codeString .= $_FILES["adharcard"] . "\n";
                  $codeString .= $_FILES["10marksheet"] . "\n";
                  $codeString .= $_FILES["12marksheet"] . "\n";
                  $codeString .= $_FILES["birth"] . "\n";
                  $codeString .= $_FILES["caste"] . "\n";
                  $codeString .= $_FILES["noncreamy"] . "\n";
                  $codeString .= $_FILES["nationality"] . "\n";
      

                  $filename = $PNG_TEMP_DIR . 'test' . md5($codeString) . '.png';

                  QRcode::png($codeString, $filename, $files);

                  echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" /><hr/>';
                }

                ?>

</body>
</html>