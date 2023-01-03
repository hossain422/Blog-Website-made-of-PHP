
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>



                    <div class="post_body">
                        <h4>Add New Post</h4>
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $title    = mysqli_real_escape_string($db->link, $_POST['title']);
                                $body     = mysqli_real_escape_string($db->link, $_POST['body']);
                                $author   = mysqli_real_escape_string($db->link, $_POST['author']);
                                $category = mysqli_real_escape_string($db->link, $_POST['category']);
                                $tags     = mysqli_real_escape_string($db->link, $_POST['tags']);
                                $userid     = mysqli_real_escape_string($db->link, $_POST['userid']);



                                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                                $file_name = $_FILES['image']['name'];
                                $file_size = $_FILES['image']['size'];
                                $file_temp = $_FILES['image']['tmp_name'];

                                $div = explode('.', $file_name);
                                $file_ext = strtolower(end($div));
                                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                                $uploaded_image = "uploads/".$unique_image;
                                
                                if($title == '' OR $body == '' OR $file_name == '' OR $author == '' OR $category == '' OR $tags == ''){
                                    echo '<h5 class="text-danger">Field not must be Empty !!</h5>';
                                }
                                elseif ($file_size >4048567) {
                                    echo '<h5 class="text-danger">Image File size is too long !!</h5>';
                                }
                                 elseif (in_array($file_ext, $permited) === false) {
                                    echo '<h5 class="text-danger">You can upload only:-'.implode(', ' , $permited).'</h5>';
                                } 
                                else{
                                    move_uploaded_file($file_temp, $uploaded_image); 
                                    $query = "INSERT INTO blog_post(title, body, image, author, category, tags, userid) VALUES('$title', '$body', '$uploaded_image', '$author', '$category', '$tags', '$userid')";
                                    $insert_post = $db->insert($query);
                                    if($insert_post){
                                        echo '<h5 class="text-success">Post Update is Successfully!</h5>';
                                    }
                                    else{
                                        echo '<h5 class="text-danger">Post Updated Fail !!</h5>';
                                    }
                                }
                            }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table class="mt-1">
                                <tr>
                                    <td>Title :</td>
                                    <td><input type="text" name="title"></td>
                                </tr>
                                <tr>
                                    <td>Category :</td>
                                    <td><select name="category" id="">
                                        <option value="">Select Category</option>
                                        <?php
                                            $query = "SELECT * FROM blog_category order by id desc";
                                            $category = $db->select($query);
                                            if($category){
                                                while($result = $category->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>
                                        <?php } }?>
                                    </select></td>
                                </tr>
                                
                                <tr>
                                    <td>Upload Image :</td>
                                    <td><input type="file" name="image"></td>
                                </tr>
                                <tr>
                                    <td>Content :</td>
                                    <td class="mx-4"><textarea name="body" id="" cols="30" rows="10"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Tags :</td>
                                    <td><input type="text" name="tags"></td>
                                </tr>
                                <tr>
                                    <td>Author :</td>
                                    <td><input type="text" name="author" value="<?php
                                        $query = "SELECT * FROM blog_user where role = '$userrole'";
                                        $user = $db->select($query);
                                        if($user){
                                        while($result = $user->fetch_assoc()){
                                           echo $result['username']; } }?>">

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
                                    <td><input class="mt-1" type="submit" name="update" value="Update"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body');
</script>

<?php include 'inc/footer.php' ?>
