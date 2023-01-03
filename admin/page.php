
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>
<?php
    if(!isset($_GET['pageid']) OR $_GET['pageid'] == NULL){
        header('Location: index.php');
    }
    else{
        $id = $_GET['pageid'];
    }

?>


                        
                    <div class="body_part">
                        <h4>Update Page</h4>
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
                                    $query = "UPDATE blog_page set
                                        name = '$name',
                                        body = '$body'
                                        WHERE id = '$id'
                                    ";
                                    $insert_category = $db->update($query);
                                    if($insert_category){
                                        echo '<h5 class="text-success">Page Updated is Successfully!</h5>';
                                    }
                                    else{
                                        echo '<h5 class="text-danger">Page Updated Fail !!</h5>';
                                    }
                                }
                            }
                            $query = "SELECT * FROM blog_page WHERE id='$id'";
                            $page = $db->select($query);
                            while($result = $page->fetch_assoc()){
                        ?>
                    
                        <form action="" method="POST">
                            <table class="mt-4">
                                <tr>
                                    <td>Add New :</td>
                                    <td><input type="text" name="name" value="<?php echo $result['name'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Content :</td>
                                    <td class="mx-4"><textarea name="body" id="" cols="30" rows="10"><?php echo $result['body'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="update" value="Update">
                                        <a onclick="return confirm('Are your sure to delete Page!!')" href="delete_page.php?dltpageid=<?php echo $result['id'] ?>">Delete</a>
                                </td>
                                </tr>
                            </table>
                        </form>
                        <?php }?>
                    </div>
                    
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body');
</script>
<?php include 'inc/footer.php' ?>
