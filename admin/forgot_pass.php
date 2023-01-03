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
                    <form action="" method="POST">
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $email = $format->validation($_POST['email']);

                                $email = mysqli_real_escape_string($db->link, $email);
                                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                    echo '<h5 class="text-danger">Invalid Email Address !!</h5>';
                                }

                                else {
                                    $query = "SELECT * FROM blog_user WHERE email = '$email' limit 1";
                                    $result = $db->select($query);
                                    if($result != false){
                                        while($value = $result->fetch_assoc()){
                                            $userId = $result['id'];
                                            $username = $result['username'];
                                        }
                                        $text = substr($email, 0, 3);
                                        $rand = rand(10000, 99999);
                                        $newpass = "$text$rand";
                                        $password = md5($newpass);

                                        $updatequery = "UPDATE blog_user SET
                                        password = $password
                                        where id = $userId";

                                        $update = $db->update($updatequery);

                                        $to = '$email';
                                        $from = 'benglish085@gmail.com';
                                        $header = 'FROM : $from/n';
                                        $subject = 'Your Password';
                                        $message = "Your Username is ".$username."and Password is ".$newpass."Please! Visit Website To Login.";

                                        $sendmail = mail($to, $from, $subject, $message, $header);
                                        if($sendmail){
                                            echo '<h5 class="text-Success">Please Check Your Email For New Password</h5>';
                                        }
                                        else{
                                            echo '<h5 class="text-danger">Email Not Send !!</h5>';
                                        }
                                    }
                                    else{
                                        echo '<h5 class="text-danger">Email Not Exist !!</h5>';
                                    }
                                }
                            }
                        ?>
                        <h3>Forgot Password</h3>
                        <label for="">Email</label>
                        <input type="email" name="email" id="">
                        
                        <button type="submit">Send Email</button>
                        <a href="login.php">Login</a>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</body>
</html>