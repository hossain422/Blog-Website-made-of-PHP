<?php
    include '../inc/Session.php';
    Session::checkLogin();
    include '../inc/connect.php';
    include '../inc/Database.php';
    include '../help/Format.php';

    $format = new Format();
    $db = new Database();
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="container">
        <div class="login">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="login.php" method="POST">
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $username = $format->validation($_POST['username']);
                                $password = $format->validation(md5($_POST['password']));

                                $username = mysqli_real_escape_string($db->link, $username);
                                $password = mysqli_real_escape_string($db->link, $password);

                                $query = "SELECT * FROM blog_user WHERE username = '$username' AND password = '$password'";
                                $result = $db->select($query);
                                if($result != false){
                                    $value = mysqli_fetch_array($result);
                                    $row = mysqli_num_rows($result);
                                    if($row > 0){
                                        Session::set('login', true);
                                        Session::set('username', $value['username']);
                                        Session::set('userId', $value['id']);
                                        Session::set('userRole', $value['role']);

                                        header('Location: index.php');
                                    }
                                    else{
                                        echo '<h5 class="text-danger">No Result Founded !!</h5>';
                                    }
                                }
                                else{
                                    echo '<h5 class="text-danger">Username or Password not Matched !!</h5>';
                                }
                            }
                        ?>
                        <h3>Admin Login</h3>
                        <label for="">Username</label>
                        <input type="text" name="username" id="">
                        <label for="">Password</label>
                        <input type="password" name="password" id="">
                        <button type="submit">Login</button>
                        <a href="forgot_pass.php">Forgot Password</a>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</body>
</html>