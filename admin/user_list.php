
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>




                    <div class="body_part">
                        <h4>User List</h4>
                        <?php
                            if(isset($_GET['deluserid'])){
                                $deluserid = $_GET['deluserid'];
                                $query = "DELETE FROM blog_user WHERE id='$deluserid'";
                                $delete_user = $db->delete($query);
                                if($delete_user){
                                    echo '<h5 class="text-success">User Deleted is Successfully!</h5>';
                                }
                                else{
                                    echo '<h5 class="text-danger">User Not Deleted !!</h5>';
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
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>UserRole</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM blog_user order by id desc";
                                    $category = $db->select($query);
                                    if($category){
                                        $i = 1;
                                        while($result = $category->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $i++?></td>
                                    <td><?php echo $result['name']; ?></td>
                                    <td><?php echo $result['username']; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td><?php echo $result['details']; ?></td>
                                    <td><?php 
                                        if($result['role'] == 1){
                                            echo 'Admin';
                                        }
                                        elseif($result['role'] == 2){
                                            echo 'Author';
                                        }
                                        else{
                                            echo 'Editor';
                                        }
                                    ?></td>
                                    <td>
                                        <a href="view_user.php?userid=<?php echo $result['id'] ?>">View</a> 
                                        <?php
                                            if(Session::get('userRole') == '1'){
                                        ?>   
                                        || <a onclick="return confirm('Are your sure to delete User!!')" href="?deluserid=<?php echo $result['id'] ?>">Delete</a>
                                        <?php }?>
                                    </td>
                                </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                    

<?php include 'inc/footer.php' ?>
