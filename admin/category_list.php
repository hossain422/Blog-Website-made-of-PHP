
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>




                    <div class="body_part">
                        <h4>Category List</h4>
                        <?php
                            if(isset($_GET['delcategoryid'])){
                                $delcategoryid = $_GET['delcategoryid'];
                                $query = "DELETE FROM blog_category WHERE id='$delcategoryid'";
                                $delete_category = $db->delete($query);
                                if($delete_category){
                                    echo '<h5 class="text-success">Category Deleted is Successfully!</h5>';
                                }
                                else{
                                    echo '<h5 class="text-danger">Category Not Deleted !!</h5>';
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
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM blog_category order by id desc";
                                    $category = $db->select($query);
                                    if($category){
                                        $i = 1;
                                        while($result = $category->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $i++?></td>
                                    <td><?php echo $result['name']; ?></td>
                                    <td><a href="edit_category.php?categoryid=<?php echo $result['id'] ?>">Edit</a> || <a onclick="return confirm('Are your sure to delete Category!!')" href="?delcategoryid=<?php echo $result['id'] ?>">Delete</a></td>
                                </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                    

<?php include 'inc/footer.php' ?>
