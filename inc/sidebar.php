                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="category">
                            <h4>Categories</h4>
                            <ul>
                                <?php
                                $query = "SELECT * FROM blog_category";
                                $category = $db->select($query);
                                if($category){
                                    while($result = $category->fetch_assoc()){
                                ?>

                                <li><a href="posts.php?category=<?php echo $result['id'];?>"><?php echo $result['name'] ;?></a></li>

                                <?php } } else{ echo '<li><a href="">Category isn`t Avilable</a></li>'; }?>
                            </ul>
                        </div>
                        <div class="latest_post">
                            <h4>Latest Post</h4>
                                <?php
                                $query = "SELECT * FROM blog_post LIMIT 5";
                                $post = $db->select($query);
                                if($post){
                                    while($result = $post->fetch_assoc()){
                                
                                ?>
                            <div class="post_item">
                            <a href="single.php?id=<?php echo $result['id']; ?>"><h5><?php echo $result['title'] ?></h5></a>
                                <div class="img_dis">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="list_img">
                                            <a href="single.php?id=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image'] ;?>" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="discrip">
                                            <p class="m-0"><?php echo $format->shortText($result['body'], 80 ); ?></p>

    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } }?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
