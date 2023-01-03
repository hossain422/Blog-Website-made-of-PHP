
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>
<?php
    if(!isset($_GET['viewinbox']) OR $_GET['viewinbox'] == NULL){
        header('Location: inbox.php');
    }
    else{
        $id = $_GET['viewinbox'];
    }
?>

                    <div class="body_part post_body">
                        <h4>View Message</h4>
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            echo '<script>window.location = "inbox.php";</script>';
                        }
                            $query = "SELECT * FROM blog_contact WHERE id='$id' order by id desc";
                            $inbox = $db->select($query);
                            while($result = $inbox->fetch_assoc()){
                        ?>
                    
                        <form action="" method="POST">
                             
                            <table class="mt-1">
                                <tr>
                                    <td>Name :</td>
                                    <td><input type="text" readonly value="<?php echo $result['name'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Email :</td>
                                    <td><input type="text" readonly value="<?php echo $result['email'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Subject :</td>
                                    <td><input type="text" readonly value="<?php echo $result['subject'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Date :</td>
                                    <td><input type="text" readonly value="<?php echo $format->dateFormat($result['date']); ?>"></td>
                                </tr>
                                <tr>
                                    <td>Message : </td>
                                    <td><textarea readonly id="" cols="75" rows="10"><?php echo $result['message'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" value=".....Ok.....">
                                        || <a class="btn btn-success" href="reply_inbox.php?viewinbox=<?php echo $result['id'] ?>">Reply</a>
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