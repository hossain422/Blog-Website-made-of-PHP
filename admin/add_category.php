
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>



                    <div class="body_part">
                        <h4>Add New Category</h4>
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $name = $_POST['name'];
                                $name = mysqli_real_escape_string($db->link, $name);
                                if(empty($name)){
                                    echo '<h5 class="text-danger">Field not must be Empty !!</h5>';
                                }
                                else{
                                    $query = "INSERT INTO blog_category(name) VALUES('$name')";
                                    $insert_category = $db->insert($query);
                                    if($insert_category){
                                        echo '<h5 class="text-success">Category Updated is Successfully!</h5>';
                                    }
                                    else{
                                        echo '<h5 class="text-danger">Category Updated Fail !!</h5>';
                                    }
                                }
                            }
                        ?>
                    
                        <form action="" method="POST">
                            <table class="mt-4">
                                <tr>
                                    <td>Add New :</td>
                                    <td><input type="text" name="name"></td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="update" value="Update"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    

<?php include 'inc/footer.php' ?>
