<?php
    session_start();
    $conn = mysqli_connect("localhost","id5212758_korisnici","jure12345678","id5212758_jurenovak");
    $msg="";
    
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = sha1($password);
        $userType = $_POST['userType'];
        
        $sgl = "SELECT * FROM users WHERE username=? AND password=? AND user_type=?";
        $stmt=$conn->prepare($sgl);
        $stmt->bind_param("sss",$username,$password,$userType);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        session_regenerate_id();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['user_type'];
        session_write_close();
        
        if($result->num_rows==1 && $_SESSION['role']=="admin"){
            header("location:index.html");
        }
        else if($result->num_rows==1 && $_SESSION['role']=="igrac"){
            header("location:index.html");
        }
        else if($result->num_rows==1 && $_SESSION['role']=="sudac"){
             header("location:index.html");
        }
        else{
            $msg = "Username,Password or Role is incorrect!";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Josip Novak">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styleNoviLogin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
    <body class="bg-dark">
        <div class="container d-flex justify-content-center align-items-center ">
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-lg-150 bg-light mt-5 px-0">
                    <h3 class="text-center text-light bg-warning p-3">Multi Login</h3>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="p-4">
                        <div class="form-group">
                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                        </div>
                         <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                        </div>
                        <div class="form-group lead">
                            <label  for="userType">Izaberi-></label>
                            <input type="radio" name="userType" value="admin" class="custom-radio" required>&nbsp;Admin |
                            <input type="radio" name="userType" value="igrac" class="custom-radio" required>&nbsp;Igrac |
                             <input type="radio" name="userType" value="sudac" class="custom-radio" required>&nbsp;Sudac
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" class="btn btn-warning btn-block">
                        </div>
                        <h5 class="text-danger text-center"><?= $msg; ?></h5>
                    </form>
                </div>
            </div>
            </div>
        </div>
      </body>
    
</html>