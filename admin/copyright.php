
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>



                    <div class="body_part">
                        <h4>Update CopyRight Text</h4>
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $copyright    = mysqli_real_escape_string($db->link, $_POST['copyright']);
                  
                                if($copyright == ''){
                                    echo '<h5 class="text-danger">Field not must be Empty !!</h5>';
                                }
                                
                                else{
                                    $query = "UPDATE blog_copyright SET 
                                        copyright = '$copyright'
                                        WHERE id = '1'";
                                        $update_title = $db->update($query);
                                        if($update_title){
                                            echo '<h5 class="text-success">CopyRight Text Updated is Successfully!</h5>';
                                        }
                                        else{
                                            echo '<h5 class="text-danger">CopyRight Text Updated Fail !!</h5>';
                                        }
                                }
                            }
                            $query = "SELECT * FROM blog_copyright";
                            $post = $db->select($query);
                            while($result = $post->fetch_assoc()){
                        ?>
                        <form action="" method="POST">
                            <table class="mt-4">
                                <tr>
                                    <td>CopyRight Text :</td>
                                    <td><input type="text" name="copyright" value="<?php echo $result['copyright']; ?>"></td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="update" value="Update"></td>
                                </tr>
                            </table>
                        </form>
                        <?php }?>
                    </div>
                    

<?php include 'inc/footer.php' ?>
