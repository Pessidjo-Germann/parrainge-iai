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
                <th scope="col">NOM-ETUDIANT</th>-->
                <th scope="col">NOM PARRAINT</th>
                <th scope="col">CLASSE PARRAINT</th>
                <th scope="col">NUMERO PARRAINT</th>
              </tr>
             </thead>
             <tbody>
             <?php
              $user_id=$_SESSION['user_id'];
              $sql = "SELECT users.name, parrain.nom_p, parrain.classe,parrain.number FROM parrain JOIN users ON parrain.id_p=$user_id;";
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
            if ($row!=0) {
             
                ?>
             <tr>
               
               <td> <?php echo $row['name']?></td>
              <!-- <td><?php echo $row['nom_p']?></td>-->
               <td><?php echo $row['classe']?></td>
               <td><?php echo $row['number']?></td>
              </tr> 
              <?php
        
            ?><?php              
                 }else{
?>
                  <p>Aucun parrain de disponible</p>
              <?php
                }
             ?>
          
             </tbody>
          </table>
     </div>
   
</section>

<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>
<script type="text/javascript" src="js/jquery.js "></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js "></script>

</body>
</html>