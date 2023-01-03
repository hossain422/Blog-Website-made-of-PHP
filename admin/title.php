<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>


                        
                    <div class="body_part">
                        <h4>Update Site Title and Discripion</h4>
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $title    = mysqli_real_escape_string($db->link, $_POST['title']);
                                $description     = mysqli_real_escape_string($db->link, $_POST['description']);
                                

                                if($title == '' OR $description == '' ){
                                    echo '<h5 class="text-danger">Field not must be Empty !!</h5>';
                                }
                                
                                else{
                                    $query = "UPDATE blog_sitetitle SET 
                                        title = '$title',
                                        description = '$description'
                                        WHERE id = '1'";
                                        $update_title = $db->update($query);
                                        if($update_title){
                                            echo '<h5 class="text-success">Title and Description Updated is Successfully!</h5>';
                                        }
                                        else{
                                            echo '<h5 class="text-danger">Title and Description Updated Fail !!</h5>';
                                        }
                                }
                            }
                            $query = "SELECT * FROM blog_sitetitle";
                            $post = $db->select($query);
                            while($result = $post->fetch_assoc()){
                        ?>
                        <form action="" method="POST">
                            <table class="mt-4">
                                <tr>
                                    <td>Title :</td>
                                    <td><input type="text" name="title" value="<?php echo $result['title'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Discription :</td>
                                    <td><input type="text" name="description" value="<?php echo $result['description'] ?>"></td>
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
