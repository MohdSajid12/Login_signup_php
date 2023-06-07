<?php
 require "config.php";

if(isset($_POST['submit'])){

    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $duplicate = mysqli_query($conn , "SELECT * from tb_user WHERE username ='$username' or email = '$email'");

    if(mysqli_num_rows($duplicate) > 0){
        echo "<script> alert('username or email already taken');</script>";
    }
    else{

        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES ('','$name','$username','$email','$password')";
        

        mysqli_query($conn,$query);
        echo  "<script> alert('Registeration successfull');</script>";
    }
    else {
        echo  "<script> alert('password does not match');</script>";
    }
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>

    <form action="" method="post">

    <label for="">Name:</label><br>
    <input type="text" name="name" id=""><br><br>

    <label for="">Username:</label><br>
    <input type="username" name="username" id=""><br><br>

    <label for="">Email:</label><br>
    <input type="email" name="email" id=""><br><br>

    <label for="">Password:</label><br>
    <input type="password" name="password" id=""><br><br>

    <label for="">Confirm-Password:</label><br>
    <input type="password" name="confirmpassword" id=""><br><br>

    <button type="submit" name="submit">Register</button>

    </form>

    <br>

    <a href="login.php">Login</a>
</body>
</html>