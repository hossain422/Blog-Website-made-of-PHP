
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>



                        
                    <div class="body_part">
                        <h4>Update Page</h4>
                        <?php
                            if(isset($_GET['dltpageid'])){
                                $dltpageid = $_GET['dltpageid'];
                                $query = "DELETE FROM blog_page WHERE id='$dltpageid'";
                                $delete_page = $db->delete($query);
                                if($delete_page){
                                    echo '<h5 class="text-success">Page Deleted is Successfully!</h5>';
                                    echo '<script>window.location = "index.php";</script>';
                                }
                                else{
                                    echo '<h5 class="text-danger">Page Not Deleted !!</h5>';
                                }
                            }
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
                                        <a onclick="return confirm('Are your sure to delete Page!!')" href="?dltpageid=<?php echo $result['id'] ?>">Delete</a>
                                </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body');
</script>
<?php include 'inc/footer.php' ?>
