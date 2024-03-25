<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $quartier= mysqli_real_escape_string($conn, $_POST['quartier']); 
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $sexe=mysqli_real_escape_string($conn,$_POST['sexe']);
   $user_type = $_POST['user_type'];
   $class = $_POST['class'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
   
   //if(mysqli_num_rows($select_users) > 0){
    //  $message[] = 'user already exist!';
  // }
   //else{

      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type, class,sexe,quartier) VALUES('$name', '$email', '$cpass', '$user_type' ,'$class','$sexe','$quartier')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
  // }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>



<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>S'inscrire maintenant</h3>
      <input type="text" name="name" placeholder="entrer votre nom" required class="box">
      <input type="email" name="email" placeholder="entrer votre email" required class="box">
      <input type="quartier" name="quartier" placeholder="entrer votre quartier" required class="box">
      <input type="password" name="password" placeholder="enter your password" required class="box">
      <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
     
      <select name="user_type" class="box">
         <option value="user">niveau 1</option>
        <!-- <option value="admin">admin</option>-->
      </select>
      <select name="sexe" class="box">
         <option value="femme">Femme</option>
         <option value="homme">Homme</option>
        <!-- <option value="admin">admin</option>-->
      </select>
      <select name="class" class="box">
         <option value="SR">Systemes Reseaux</option>
         <option value="GL">Genie Logiciel</option>
      </select>

      <input type="submit" name="submit" value="s'inscrire" class="btn">
      <p>J'ai deja un compte? <a href="login.php">login now</a></p>
   
   </form>

</div>

</body>
</html>