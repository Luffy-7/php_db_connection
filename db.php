<?php
$insert = false;
$name = $_POST['firstname'];
// echo $name;
// if(isset($_POST['firstname']))
if(strlen($_POST['firstname'])!=0 && strlen($_POST['lastname'])!=0 && strlen($_POST['age'])!=0 && strlen($_POST['email'])!=0 && strlen($_POST['password'])!=0 )

{


   $server= "localhost";
   $username = "root";
   $password = "";
   $database= "signup";
   
   $con = mysqli_connect($server, $username, $password, $database);

   if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
   }
   // echo "Successfully connected to database";
   $fname= $_POST['firstname'];
   $lname= $_POST['lastname'];
   $age= $_POST['age'];
   $email= $_POST['email'];
   $password= $_POST['password'];

    $sql= "  INSERT INTO `sign_up`( `firstname`, `lastname`, `age`, `email`, `password`, `date`) VALUES ('$fname','$lname','$age','$email','$password', current_timestamp());";
   //  echo $sql;

    if($con->query($sql) == true){
      // echo "successful insert";
      $insert = true;
    }
    else{
      echo "error : $sql <br> $con->error ";


    }
    $con->close();
   }
   else{
      echo "no data";
   }
   ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
      <?php
      if($insert == true)
      {
        echo "<div>successfully submitted</div>";
      }
      ?>
            <div class="head">Sign Up Page</div>

            <form  method="post" action="db.php" >
                <input type="text" name="firstname" placeholder="Enter your first name" >
                <input type="text" name="lastname" placeholder="Enter your last name" >
                <input type="number" name="age" placeholder="Enter your age" >
                <input type="email" name="email" placeholder="Enter your email" >
                <input type="password" name="password" maxlength="8"   placeholder="Enter your password" >

                <button type="submit">Submit</button>
            </form>
        
    </div>
</body>
</html>