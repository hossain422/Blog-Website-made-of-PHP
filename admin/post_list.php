
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>


                    <div class="body_part">
                        <h4>Post List</h4>
                        <?php
                            if(isset($_GET['delpostid'])){
                                $delpostid = $_GET['delpostid'];
                                $query = "DELETE FROM blog_post WHERE id='$delpostid'";
                                $delete_post = $db->delete($query);
                                if($delete_post){
                                    echo '<h5 class="text-success">Post Deleted is Successfully!</h5>';
                                }
                                else{
                                    echo '<h5 class="text-danger">Post Not Deleted !!</h5>';
                                }
                            }
                        ?>
                        <div class="search_box">
                            <div class="show d-inline-flex">
                                <p>Show</p>
                                <select name="" id="">
                                    <option value="">10</option>
                                    <option value="">25</option>
                                    <option value="">50</option>
                                    <option value="">75</option>
                                    <option value="">100</option>
                                </select>
                                
                            </div>
                            <div class="search_inbox">
                                <form action="">
                                    <input type="search" name="" id="" placeholder="Search..">
                                    <input type="submit" value="Search">
                                </form>
                            </div>
                        </div>
                        <table class="table inbox_table border table-hover">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Post Title</th>
                                    <th>Discription</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM blog_post order by id desc";
                                    $post = $db->select($query);
                                    if($post){
                                        $i = 1;
                                        while($result = $post->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $i++ ;?></td>
                                    <td><a class="postlist_title" href="edit_post.php?postid=<?php echo $result['id'] ?>"><?php echo $result['title'] ?></a></td>
                                    <td><?php echo $format->shortText($result['body'], 30 ); ?></td>
                                    <td><?php echo $result['category'] ?></td>
                                    <td><img src="<?php echo $result['image'] ?>" width="60px" height="40px" alt=""></td>
                                    <td><?php echo $format->dateFormat($result['date']); ?></td>
                                    <td>
                                        <a href="view_post.php?postid=<?php echo $result['id'] ?>">View</a> ||
                                        <a href="edit_post.php?postid=<?php echo $result['id'] ?>">Edit</a> 
                                        <?php
                                                if(Session::get('userRole') == '1'){
                                            ?>  
                                        || <a onclick="return confirm('Are your sure to delete Post!!')" href="?delpostid=<?php echo $result['id'] ?>">Delete</a>
                                        <?php }?>
                                    </td>
                                </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                    

<?php include 'inc/footer.php' ?>
