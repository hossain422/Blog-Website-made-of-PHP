        <div class="body">
            <div class="row">
                <div class="col-md-2">
                    <div class="side_menu">
                        <nav>
                            <ul>
                                <li> <a href="">Site Option</a>
                                    <div class="submenu">
                                        <ul>
                                            <li>
                                                <a href="title.php">Title & Slogan</a>
                                            </li>
                                            <li>
                                                <a href="social.php">Social Media</a>
                                            </li>
                                            <li>
                                                <a href="copyright.php">CopyRight</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li> <a href="">Page</a>
                                    <div class="submenu">
                                        <ul>
                                            <li>
                                                <a href="add_page.php">Add New</a>
                                            </li>
                                            <?php
                                                $query = "SELECT * FROM blog_page";
                                                $page = $db->select($query);
                                                if($page){
                                                    while($result = $page->fetch_assoc()){
                                            ?>
                                            <li>
                                                <a href="page.php?pageid=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a>
                                            </li>
                                            <?php } }?>
                                        </ul>
                                    </div>
                                </li>
                                <li> <a href="">Category</a>
                                    <div class="submenu">
                                        <ul>
                                            <li>
                                                <a href="add_category.php">Add New</a>
                                            </li>
                                            <li>
                                                <a href="category_list.php">All Category</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>
                                <li> <a href="">Post</a>
                                    <div class="submenu">
                                        <ul>
                                            <li>
                                                <a href="add_post.php">Add New</a>
                                            </li>
                                            <li>
                                                <a href="post_list.php">All Post</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>
                                <li> <a href="">User</a>
                                    <div class="submenu">
                                        <ul>
                                            <?php
                                                if(Session::get('userRole') == '1'){
                                            ?>            
                                            <li>
                                                <a href="add_user.php">Add User</a>
                                            </li>
                                            <?php } ?>
                                            <li>
                                                <a href="user_list.php">User List</a>
                                            </li>
                                            <li>
                                                <a href="profile.php">User Profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-10">
