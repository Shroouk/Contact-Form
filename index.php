<?php

    require_once 'Config.php';

/*------------------- check if user coming from request ----------------*/
  if ($_SERVER['REQUEST_METHOD']=='POST') {

        $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
        $msg = filter_var($_POST['message'],FILTER_SANITIZE_STRING);

        $userError = '';
        $msgError ='';
        $emailError='';

/*------------- creating erroe messages-------------------------------*/

    if (strlen($user)<3) {
      $userError='username must be larger than 3 characters!';

    }

  if (strlen($email)==0) {
    $emailError='you must enter your Email';
  }

  if (strlen($msg)<10) {
    $msgError='message must be larger than 10 characters';
  }




/*-------------------------------if no errors, send the Email[mail(to,subject,message,headers,parameters)]*/


$sql = "INSERT INTO users (username, email, phone,message)
              VALUES ('$user','$email','$phone','$msg')";

      $stmt =$db->prepare($sql);
      $result =$stmt->execute();

if (empty($userError) && empty($msgError) && empty($emailError)) {
@  mail($myEmail,$subject,$msg,$headers);

  $user = '';
  $email = '';
  $phone ='' ;
  $msg = '';

  $success ='<div class="alert alert-success" role="alert">We have recieved your Email</div>';

}


}
 ?>





<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <title>contact form</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/fontawesome.min.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Krona+One|Lobster|Marko+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">





</head>

<body>
  <!--///////////////////////// form ///////////////////////////////////-->


 <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
   <div class="contact-form-tittle" style="background-image: url(img/bg2.jpg);">
    <h2 class="text-center">CONTACT US</h2>
  </div>

    <?php
      if (isset($success)) {
        echo $success;
      }

     ?>

<!--/////////////////////// form inputs ///////////////////////////-->


<div class="form-inputs">
    <div class="form-group">
      <label for="exampleInputexampleInputUsername">Username</label>
      <i class="fas fa-user-circle fa-fw"></i>
      <input type="text" name="username" class="form-control username" id="exampleInputUsername" placeholder="Type your username, more than 3 characters" value="<?php if (isset($user)) { echo $user;}?>">
      <span class="asterisx">*</span>

      <div class="u-rrors" id="uerror">
        <?php
          if (!empty($userError)) {
            echo '<div class="alert alert-danger custom-alert" role="alert">'.$userError.'</div>' ;
         }
       ?>
     </div>
     <div class="u-error"></div>
    </div>


    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <i class="fas fa-at fa-fw"></i>
      <input type="email" class="form-control email" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="please type a valid Email">
        <span class="asterisx">*</span>
        <div class="e-error"></div>

        <div class="e-rrors" id="uerror">
          <?php
            if (!empty($emailError)) {
              echo '<div class="alert alert-danger custom-alert" role="alert">'.$emailError.'</div>' ;
           }
         ?>
       </div>

    </div>

    <div class="form-group">
      <label for="exampleInputexampleInputPhone">Cell phone</label>
      <i class="fas fa-phone-alt fa-fw"></i>
      <input type="text" class="form-control" name="phone" id="exampleInputPhone" placeholder="Enter your cell phone number" >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email or phone number with anyone else.</small>


    </div>


  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember me </label>

  </div>


 <div class="txt">

    <textarea class="form-control message" placeholder="Your Message !" name="message" ></textarea><br>

    <div class="errors">
      <?php
       if (!empty($msgError)) {
              echo '<div class="alert alert-danger " role="alert">'. $msgError.'</div>' ;
               }
                ?>
      </div>

      <div class="m-error"></div>

      <button type="submit" class="btn btn-success" style="border-radius: 25px;"> Send message <i class="fas fa-paper-plane send-icon"></i> </button>

  </div>
</div>
</form>



<!--//////////////// scripts /////////////////////////////-->
  <script src="js/all.min.js"></script>
  <script src="js/jquery-3.4.1.min.js" ></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js" ></script>

</body>
</html>
