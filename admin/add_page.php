
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>



                    <div class="body_part">
                        <h4>Add New Page</h4>
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $name = $_POST['name'];
                                $body = $_POST['body'];

                                $name = mysqli_real_escape_string($db->link, $name);
                                $body = mysqli_real_escape_string($db->link, $body);
                                if($name == '' OR $body == ''){
                                    echo '<h5 class="text-danger">Field not must be Empty !!</h5>';
                                }
                                else{
                                    $query = "INSERT INTO blog_page(name, body) VALUES('$name', '$body')";

                                    $insert_category = $db->insert($query);
                                    if($insert_category){
                                        echo '<h5 class="text-success">Page Updated is Successfully!</h5>';
                                    }
                                    else{
                                        echo '<h5 class="text-danger">Page Updated Fail !!</h5>';
                                    }
                                }
                            }
                        ?>
                    
                        <form action="" method="POST">
                            <table class="mt-4">
                                <tr>
                                    <td>Page Name :</td>
                                    <td><input type="text" name="name"></td>
                                </tr>
                                <tr>
                                    <td>Content :</td>
                                    <td class="mx-4"><textarea name="body" id="" cols="30" rows="10"></textarea></td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="update" value="Create Page"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body');
</script>
<?php include 'inc/footer.php' ?>
