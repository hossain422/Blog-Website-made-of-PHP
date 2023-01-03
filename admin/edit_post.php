
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>
<?php
    if(!isset($_GET['postid']) OR $_GET['postid'] == NULL){
        header('Location: post_list.php');
    }
    else{
        $id = $_GET['postid'];
    }
?>

                    <div class="body_part post_body">
                        <h4>Edit Post</h4>
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $title    = mysqli_real_escape_string($db->link, $_POST['title']);
                                $body     = mysqli_real_escape_string($db->link, $_POST['body']);
                                $author   = mysqli_real_escape_string($db->link, $_POST['author']);
                                $category = mysqli_real_escape_string($db->link, $_POST['category']);
                                $tags     = mysqli_real_escape_string($db->link, $_POST['tags']);
                                $userid   = mysqli_real_escape_string($db->link, $_POST['userid']);

                                if($title == '' OR $body == '' OR $author == '' OR $category == '' OR $tags == ''){
                                    echo '<h5 class="text-danger">Field not must be Empty !!</h5>';
                                }
                                
                                else{
                                    $query = "UPDATE blog_post SET 
                                        title    = '$title',
                                        body     = '$body',
                                        author   = '$author',
                                        category = '$category',
                                        tags     = '$tags',
                                        userid   = '$userid'
                                        WHERE id = '$id'";
                                        $update_post = $db->update($query);
                                        if($update_post){
                                            echo '<h5 class="text-success">Post Updated is Successfully!</h5>';
                                        }
                                        else{
                                            echo '<h5 class="text-danger">Post Updated Fail !!</h5>';
                                        }
                                }
                            }
                            $query = "SELECT * FROM blog_post WHERE id='$id' order by id desc";
                            $post = $db->select($query);
                            while($result = $post->fetch_assoc()){
                        ?>
                    
                        <form action="" method="POST">
                             
                            <table class="mt-1">
                                <tr>
                                    <td>Title :</td>
                                    <td><input type="text" name="title" value="<?php echo $result['title'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Category :</td>
                                    <td><select name="category" id="">
                                        <option value="">Select Category</option>
                                        <?php
                                            $query = "SELECT * FROM blog_category order by id desc";
                                            $category = $db->select($query);
                                            if($category){
                                                while($catresult = $category->fetch_assoc()){
                                        ?>
                                        <option
                                            <?php
                                                if($result['category'] == $catresult['id']){ ?>
                                                    selected="selected"
                                               <?php } ?>
                                            
                                            value="<?php echo $catresult['id'] ?>"><?php echo $catresult['name'] ?>
                                        </option>
                                        <?php } }?>
                                    </select></td>
                                </tr>
                                
                                
                                <tr>
                                    <td>Content :</td>
                                    <td class="mx-4"><textarea name="body" id="" cols="20" rows="10" value="<?php echo $result['body'] ?>"><?php echo $result['body'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>Tags :</td>
                                    <td><input type="text" name="tags" value="<?php echo $result['tags'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Author :</td>
                                    <td>
                                        <input type="text" name="author" value="<?php echo $result['author'] ?>">

                                        <input type="hidden" name="userid" value="<?php
                                        $query = "SELECT * FROM blog_user where role = '$userrole'";
                                        $user = $db->select($query);
                                        if($user){
                                        while($result = $user->fetch_assoc()){
                                           echo $result['id']; } }?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input class="mt-2" type="submit" name="update" value="Update"></td>
                                </tr>
                            </table>
                        </form>
                        <?php }?>
                    </div>
                    
                    

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body');
</script>

<?php include 'inc/footer.php'; ?>