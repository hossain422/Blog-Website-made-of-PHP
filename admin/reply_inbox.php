
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>
<?php
    if(!isset($_GET['viewinbox']) OR $_GET['viewinbox'] == NULL){
        echo '<script>window.location = "inbox.php";</script>';
    }
    else{
        $id = $_GET['viewinbox'];
    }
?>


                    <div class="body_part post_body">
                        <h4>View Message</h4>
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $name = $format->validation($_POST['name']);
                            $toemail = $format->validation($_POST['toemail']);
                            $fromemail = $format->validation($_POST['fromemail']);
                            $subject = $format->validation($_POST['subject']);
                            $message = $format->validation($_POST['message']);

                            $sendmail = mail($toemail, $fromemail, $subject, $message);
                            if($sendmail){
                                echo '<h5 class="text-success">Message Send is Successfully!</h5>';
                            }
                            else{
                                echo '<h5 class="text-danger">Message Sending Fail !!</h5>';
                            }

                        }
                            $query = "SELECT * FROM blog_contact WHERE id='$id' order by id desc";
                            $inbox = $db->select($query);
                            while($result = $inbox->fetch_assoc()){
                        ?>
                        <form action="" method="POST">
                             
                            <table class="mt-1">
                                <tr>
                                    <td>Name :</td>
                                    <td><input type="text" name="name"></td>
                                </tr>
                                <tr>
                                    <td>To :</td>
                                    <td><input type="text" readonly name="toemail" value="<?php echo $result['email']; ?>" ></td>
                                </tr>
                                <tr>
                                    <td>From :</td>
                                    <td><input type="text" name="fromemail" ></td>
                                </tr>
                                <tr>
                                    <td>Subject :</td>
                                    <td><input type="text" name="subject"></td>
                                </tr>
                                
                                <tr>
                                    <td>Message : </td>
                                    <td><textarea name="message" id="" cols="75" rows="10"></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="mt-3"><input type="submit" value="Send Message"></td>
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