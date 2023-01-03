
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>



                    <div class="body_part">
                        <h4>Update Social Media Link</h4>
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $fb    = mysqli_real_escape_string($db->link, $_POST['fb']);
                                $twt     = mysqli_real_escape_string($db->link, $_POST['twt']);
                                $link    = mysqli_real_escape_string($db->link, $_POST['link']);
                                $google     = mysqli_real_escape_string($db->link, $_POST['google']);
                                

                                if($fb == '' OR $twt == '' OR $link == '' OR $google == ''){
                                    echo '<h5 class="text-danger">Field not must be Empty !!</h5>';
                                }
                                
                                else{
                                    $query = "UPDATE blog_social SET 
                                        fb = '$fb',
                                        twt = '$twt',
                                        link = '$link',
                                        google = '$google'
                                        WHERE id = '1'";
                                        $update_social = $db->update($query);
                                        if($update_social){
                                            echo '<h5 class="text-success">Social Link Updated is Successfully!</h5>';
                                        }
                                        else{
                                            echo '<h5 class="text-danger">Social Link Updated Fail !!</h5>';
                                        }
                                }
                            }
                            $query = "SELECT * FROM blog_social";
                            $post = $db->select($query);
                            while($result = $post->fetch_assoc()){
                        ?>
                        <form action="" method="POST">
                            <table class="mt-4">
                                <tr>
                                    <td>Facebook :</td>
                                    <td><input width="600px" type="text" name="fb" value="<?php echo $result['fb'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Twitter :</td>
                                    <td><input type="text" name="twt" value="<?php echo $result['twt'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>linkedIn :</td>
                                    <td><input type="text" name="link" value="<?php echo $result['link'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Google Plus :</td>
                                    <td><input type="text" name="google"  value="<?php echo $result['google'] ?>"></td>
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
