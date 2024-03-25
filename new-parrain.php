<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}



if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $class = $_POST['class'];
     
    $sql = "INSERT INTO `parrain`(`id_p`, `nom_p`, `prenom_p`, `classe`) VALUES (NULL,'$nom','$prenom','$class')";

    $result = mysqli_query($conn, $sql);
     if ($result) {
         header("location: auto-parrain.php?msg=new record created successfully");
         # code...
     }else {
         echo "error: " .mysqli_error($conn);
     }
    # code...

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


   <div class="box-container">
      <div class="container">
       <div class="text-center mb-4">
         <h3> add new parrain</h3>
         <p class="text-muted">completed the form below to add user</p>
       </div>
       <div class="container d-flex  justify-content-center ">
       <form action="" method="post" style="width:50w; min-width:300px;">
          <div class="row mb-3">
             <div class="col">
                <label class="form-label">nom</label>
                <input type="text" name="nom" id="" class="form-control" placeholder="votre nom svp"> 
             </div>
             <div class="col">
                <label for="" class="form-label">prenom</label>
                <input type="text" name="prenom" id="" class="form-control" placeholder="votre prenom svp"> 
             </div>
          </div>
           <div class="mb-3">
           <label class="form-label">class</label>
                <input type="text" name="class" id="" class="form-control" placeholder="votre class svp">
           </div>

           <div>
             <button type="submit" class="btn btn-success" name="submit">save</button>
             <a href="index.php" class="btn btn-danger">cancel</a>
           </div>
       </form>
        </div>
      </div>
   </div>

</section>









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>
<script type="text/javascript" src="js/jquery.js "></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js "></script>

</body>
</html>