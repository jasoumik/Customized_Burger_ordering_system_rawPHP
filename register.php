<?php
include('dbconnection.php');
session_start();
$message='';
if(isset($_SESSION['userID'])){
    header('Location:index.php');
}
if(isset($_POST['register'])){
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $check_query="
    SELECT * FROM tbl_user WHERE username = :username
    ";
    $statement = $connect->prepare($check_query);
    $check_data = array(
        ':username'   => $username
    );
    if($statement->execute($check_data)){
        if($statement->rowCount()>0){
            $message .='<p><label for="">Username is already used</label></p>';
        }
        else {
            if(empty($username)){
                $message .='<p><label for="">Username is required</label></p>';
            }
            if(empty($password)){
                $message .='<p><label for="">Password is required</label></p>';
            }
            else {
                if($password != $_POST["confirm_password"]){
                    $message .='<p><label for="">Password doesnt match</label></p>';
                }
            }
            if($message == ''){
                $data=array(
                    ':username' => $username,
                    ':password' => $password
                 );
                 $pass = $password;
                $query = "
                INSERT INTO tbl_user
                (username, password) 
                VALUES (:username, :password)
                ";

                $statement = $connect->prepare($query);

                if($statement->execute($data)){
                    $message = '<label for="">Registration Successful</label>';
                   
                }
            }

        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body style="background-image:url('chat.jpg')">
    <div class="container">
    <br><br><br><br><br><br><br>
    <h1 align="center" style="color:white;"><b>Chat System by JAS</b></h1>
    <br><br>
    <div class="panel panel-default">
        <div class="panel-heading">Register to Chat System</div>
        <div class="panel-body">
            <form action="" method="post">
                <span class="text-danger"><?php echo $message;?></span>
                <div class="form-group">
                    <label for="">Enter Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Enter Password</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Re-enter Password</label>
                    <input type="text" id="confirm_password"
                     name="confirm_password" class="form-control">
                </div>
                <div class="form-group">
                    <!-- <label for="">Enter Username</label> -->
                    <input type="submit" name="register" class="btn btn-info" 
                    value="Register">
                </div>
                <div align="center">
                  <a href="index.php">Go back to Home page</a>
                  <br><br>
                  <hr>
                
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>