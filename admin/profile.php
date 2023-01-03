
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>
<?php
    $id = Session::get('userId');
    $userrole = Session::get('userRole');
?>

<div class="body_part post_body">
                        <h4>User Profile</h4>
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $name = $format->validation($_POST['name']);
                                $username = $format->validation($_POST['username']);
                                $email = $format->validation($_POST['email']);
                                $details = $format->validation($_POST['details']);

                                $name    = mysqli_real_escape_string($db->link, $name);
                                $username = mysqli_real_escape_string($db->link, $username);
                                $email   = mysqli_real_escape_string($db->link, $email);
                                $details = mysqli_real_escape_string($db->link, $details);

                                if($name == '' OR $username == '' OR $email == '' OR $details == ''){
                                    echo '<h5 class="text-danger">Field must Not be Empty !!</h5>';
                                }
                                
                                else{
                                    $query = "UPDATE blog_user SET 
                                        name = '$name',
                                        username = '$username',
                                        email = '$email',
                                        details = '$details'
                                        WHERE role = '$userrole'";
                                        $update_user = $db->update($query);
                                        if($update_user){
                                            echo '<h5 class="text-success">User Data Updated is Successfully!</h5>';
                                        }
                                        else{
                                            echo '<h5 class="text-danger">User Data Updated Fail !!</h5>';
                                        }
                                }
                            }
                            
                            $query = "SELECT * FROM blog_user where role = '$userrole'";
                            $user = $db->select($query);
                            if($user){
                            while($result = $user->fetch_assoc()){
                        ?>
                    
                        <form action="" method="POST">
                            <table class="mt-1">
                                <tr>
                                    <td>Name :</td>
                                    <td><input type="text" name="name" value="<?php echo $result['name'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Username :</td>
                                    <td><input type="text" name="username" value="<?php echo $result['username'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Email :</td>
                                    <td><input type="text" name="email" value="<?php echo $result['email'] ?>"></td>
                                </tr>
                                
                                <tr>
                                    <td>Address :</td>
                                    <td><textarea name="details" id="" cols="66" rows="4" ><?php echo $result['details'] ?></textarea></td>
                                </tr>
                               
                                <tr>
                                    <td></td>
                                    <td><input class="mt-2" type="submit" name="update" value="Update Profile"></td>
                                </tr>
                            </table>
                        </form>
                        <?php } }?>
                    </div>
                    
                    

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('message');
</script>

<?php include 'inc/footer.php'; ?>