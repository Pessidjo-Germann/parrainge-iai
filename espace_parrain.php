<?php

include 'config.php';

session_start();


$user_id = $_SESSION['user_id'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
   <title>users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <link rel="stylesheet" href="css/css/bootstrap.min.css">
</head>
<body>
   
<?php include 'header.php'; ?>


<section class="users">

<br>
<br>
<p class="btn btn-success"><?php echo $_SESSION['user_name'];?></p>

<div class="container">

     <?php  
     #message en ca de reusite
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
            ';
            
        }
     ?>

<table class="table table-hover text-center">
             <thead class="table-dark">
              <tr>
             <!--   
                <th scope="col">NOM-ETUDIANT</th>
    !-->
                <th scope="col">NOM DU FILIEUL</th>
                <th scope="col">CLASSE FILIEUL</th>
                <th scope="col">NUMERO FILIEUL</th>
      
              </tr>
             </thead>
             <tbody>
             <?php
             
              $user_id=$_SESSION['user_id'];
        
              $sql = "SELECT parrain.nom_p, users.name, users.class, users.number FROM users JOIN parrain ON users.id_p=$user_id;";
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
            if ($row!=0) {
            
                ?>
             <tr>
             
               <td> <?php echo $row['name']?></td>
              
               <td><?php echo $row['class']?></td>
               <td><?php echo $row['number']?></td>
              </tr> 
              <?php
             
            ?><?php              
                 }else{
?>
                  <p>Aucun FILIEUL de disponible pour le moment</p>
              <?php
                }
             ?>
          
             </tbody>
          </table>
          <br>
          <br>
     </div>
     <div class="name" >
     <center>    
     <h1>VOTRE SOIREE DE PARRAINAGE CE 29 MARS</h1>
         <h1>SOYONS TOUS CHIC ET GLAMOUR</h1></center>
     </div>
</section>

<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>
<script type="text/javascript" src="js/jquery.js "></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js "></script>

</body>
</html>