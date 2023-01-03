
<?php include 'inc/header.php' ?>
<?php include 'inc/side_menu.php' ?>



                    <div class="body_part">
                        <h4>Inbox</h4>
                        <?php
                            if(isset($_GET['seeninbox'])){
                                $seeninbox = $_GET['seeninbox'];
                                $query = "UPDATE blog_contact set
                                        status = '1'
                                        WHERE id = '$seeninbox'";
                                    $insert_category = $db->update($query);
                                    if($insert_category){
                                        echo '<h5 class="text-success">Message Send in the Seen Box.🥰🥰</h5>';
                                    }
                                    else{
                                        echo '<h5 class="text-danger">Something is Wrong !!</h5>';
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
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM blog_contact where status= '0' order by id desc";
                                    $inbox = $db->select($query);
                                    if($inbox){
                                        $i = 1;
                                        while($result = $inbox->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $result['name']; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td><?php echo $format->shortText($result['message'], 40); ?></td>
                                    <td><?php echo $format->dateFormat($result['date']); ?></td>
                                    <td><a href="view_inbox.php?viewinbox=<?php echo $result['id'] ?>">View</a> || <a href="reply_inbox.php?viewinbox=<?php echo $result['id'] ?>">Reply</a> || <a onclick="return confirm('Are your sure Message Move The Seen Box..??')" href="?seeninbox=<?php echo $result['id'] ?>">Seen</a></td>
                                </tr>
                                <?php } }?>
                                
                            </tbody>
                        </table>
                    </div>


                    <div class="body_part mt-3">
                        <h4>Seen Message</h4>
                        <?php
                            if(isset($_GET['delinboxid'])){
                                $delinboxid = $_GET['delinboxid'];
                                $query = "DELETE FROM blog_contact WHERE id='$delinboxid'";
                                $delete_inbox = $db->delete($query);
                                if($delete_inbox){
                                    echo '<h5 class="text-success">Message Deleted is Successfully!</h5>';
                                }
                                else{
                                    echo '<h5 class="text-danger">Message Not Deleted !!</h5>';
                                }
                            }
                        ?>

                        <?php
                            if(isset($_GET['unseeninbox'])){
                                $unseeninbox = $_GET['unseeninbox'];
                                $query = "UPDATE blog_contact set
                                        status = '0'
                                        WHERE id = '$unseeninbox'";
                                    $insert_category = $db->update($query);
                                    if($insert_category){
                                        echo '<h5 class="text-success">Message Send in the Inbox.🥰🥰</h5>';
                                    }
                                    else{
                                        echo '<h5 class="text-danger">Something is Wrong !!</h5>';
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
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM blog_contact where status= '1' order by id desc";
                                    $inbox = $db->select($query);
                                    if($inbox){
                                        $i = 1;
                                        while($result = $inbox->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $result['name']; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td><?php echo $format->shortText($result['message'], 40); ?></td>
                                    <td><?php echo $format->dateFormat($result['date']); ?></td>
                                    <td><a href="view_inbox.php?viewinbox=<?php echo $result['id'] ?>">View</a> || <a onclick="return confirm('Are your sure Message Move The Inbox..??')" href="?unseeninbox=<?php echo $result['id'] ?>">Unseen</a> || <a onclick="return confirm('Are your sure to delete Message!!')" href="?delinboxid=<?php echo $result['id'] ?>">Delete</a></td>
                                </tr>
                                <?php } }?>
                                
                            </tbody>
                        </table>
                    </div>
                    

<?php include 'inc/footer.php' ?>
