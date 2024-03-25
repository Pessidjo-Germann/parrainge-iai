<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `users` WHERE id = '$id'") or die('query failed');
    header('location:admin_users.php');
 }
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
   
<?php include 'admin_header.php'; ?>

<section class="users">

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
                
                <th scope="col">NOM</th>
                <th scope="col">EMAIL</th>
                <th scope="col">CLASS</th>
                <th scope="col">ACTION</th>
                

              </tr>
             </thead>
             <tbody>
             <?php
              
                 $sql = "SELECT * FROM `users`;";
                 $result = mysqli_query($conn, $sql);
                 while ($row = mysqli_fetch_assoc($result)) {
                    ?>
             <tr>
             
              <td><?php echo $row['name']?></td>
              <td><?php echo $row['email']?></td>
              <td><?php echo $row['user_type']?></td>
              <td><a href="admin_users.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('voulez-vous vraiment supp?');" class="btn btn-danger">supp</a></td>
            
            </tr> 
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