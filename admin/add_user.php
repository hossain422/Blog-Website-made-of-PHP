
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>
<?php 
    if(Session::get('userRole') !== '1'){
        echo '<script>window.location = "index.php";</script>';
    }
?>

                    <div class="body_part">
                        <h4>Add New User</h4>
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $username = $format->validation($_POST['username']);
                                $password = $format->validation(md5($_POST['password']));
                                $email = $format->validation($_POST['email']);
                                $details = $format->validation($_POST['details']);
                                $role = $format->validation($_POST['role']);

                                $username = mysqli_real_escape_string($db->link, $username);
                                $password = mysqli_real_escape_string($db->link, $password);
                                $email = mysqli_real_escape_string($db->link, $email);
                                $details = mysqli_real_escape_string($db->link, $details);
                                $role = mysqli_real_escape_string($db->link, $role);
                                
                                if($username == '' OR $password == '' OR $email == '' OR $details == ''){
                                    echo '<h5 class="text-danger">Field must not be Empty !!</h5>';
                                }
                                
                                $emailquery = "SELECT * FROM blog_user where email = '$email' limit 1";
                                $user = $db->select($emailquery);
                                if($user){
                                    echo '<h5 class="text-danger">Email Already Exits !!</h5>';
                                }
                                else{
                                    $query = "INSERT INTO blog_user(username, password, email, details, role) VALUES('$username', '$password', '$email', '$details', '$role')";
                                    $insert_user = $db->insert($query);
                                    if($insert_user){
                                        echo '<h5 class="text-success">User Registration is Successfully!</h5>';
                                    }
                                    else{
                                        echo '<h5 class="text-danger">User Ragistration Fail !!</h5>';
                                    }
                                }
                            }
                        ?>
                    
                        <form action="" method="POST">
                            <table class="mt-4">
                                <tr>
                                    <td>Username :</td>
                                    <td><input type="text" name="username"></td>
                                </tr>
                                <tr>
                                    <td>Email :</td>
                                    <td><input type="email" name="email"></td>
                                </tr>
                                <tr>
                                    <td>Password :</td>
                                    <td><input type="password" name="password"></td>
                                </tr>
                                <tr>
                                    <td>Address :</td>
                                    <td><textarea name="details" id="" cols="66" rows="4"></textarea>
                                </tr>
                                <tr>
                                    <td>User Role :</td>
                                    <td><select name="role" id="">
                                        <option value="">Select Role</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Author</option>
                                        <option value="3">Editor</option>
                                    </select>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="update" value="Registration"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    

<?php include 'inc/footer.php' ?>
