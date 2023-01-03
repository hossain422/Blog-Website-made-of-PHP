
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>
<?php
    if(!isset($_GET['userid']) OR $_GET['userid'] == NULL){
        header('Location: user_list[.php');
    }
    else{
        $id = $_GET['userid'];
    }
?>

                    <div class="body_part post_body">
                        <h4>View User Details</h4>
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            echo '<script>window.location = "user_list.php";</script>';
                        }
                            $query = "SELECT * FROM blog_user WHERE id='$id' order by id desc";
                            $user = $db->select($query);
                            while($result = $user->fetch_assoc()){
                        ?>
                    
                        <form action="" method="POST">
                             
                            <table class="mt-1">
                                <tr>
                                    <td>Name :</td>
                                    <td><input type="text" readonly value="<?php echo $result['name'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Username :</td>
                                    <td><input type="text" readonly value="<?php echo $result['username'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Email :</td>
                                    <td><input type="text" readonly value="<?php echo $result['email'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>User Role :</td>
                                    <td>
                                        <input type="text" readonly value="<?php 
                                        if($result['role'] == 1){
                                            echo 'Admin';
                                        }
                                        elseif($result['role'] == 2){
                                            echo 'Author';
                                        }
                                        else{
                                            echo 'Editor';
                                        } ?>">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>Address : </td>
                                    <td><textarea readonly id="" cols="66" rows="6"><?php echo $result['details'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" value=".....Go Back.....">
                                        
                                    </td>
                                </tr>
                                
                                
                            </table>
                        </form>
                        <?php }?>
                    </div>
                    
                    

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('message');
</script>

<?php include 'inc/footer.php'; ?>