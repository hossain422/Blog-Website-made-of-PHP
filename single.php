<?php include 'inc/header.php' ?>
<?php
    if(!isset($_GET['id']) OR $_GET['id'] == NULL ){
        echo 'Data Not Found!!';
    }
    else{
        $id = $_GET['id'];
    }

?>


        <div class="body">
            <div class="row">
                <div class="col-md-8">
                    <div class="post_list">
                        <?php
                            $query = "SELECT * FROM blog_post WHERE id = $id";
                            $post = $db->select($query);
                            if($post){
                                while($result = $post->fetch_assoc()){
                            
                        ?>
                        <div class="post_item">
                            <h3><?php echo $result['title'] ?></h3>
                            <div class="date_author mb-2 d-inline-flex">
                            <div class="date"><?php echo $format->dateFormat($result['date']); ?></div>
                                <div class="author mx-1"> By <a href=""><?php echo $result['author'] ?></a></div>
                            </div>
                            <div class="img_dis">
                                
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="single_img">
                                        <img max-width="650" height="250" src="admin/<?php echo $result['image'] ;?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="discrip">
                                            
                                            

                                        </div>
                                    </div>
                                </div>
                                <p><?php echo $result['body'] ;?></p>
                            </div>
                        </div>
                        

                        
                        <div class="related_post">
                            <h4>Related Post</h4>

                            
                            <div class="row">
                                <div class="col-lg-12 d-inline-flex">
                                    <?php
                                    $catid = $result['category']; 
                                    $query = "SELECT * FROM blog_post WHERE category = '$catid' order by rand() limit 3";
                                    $relatedpost = $db->select($query);
                                    if($relatedpost){
                                        while($rresult = $relatedpost->fetch_assoc()){
                                    ?>
                                    <div class="related_post_1 mx-1">
                                        <a href="single.php?id=<?php echo $rresult['id']; ?>"><img src="admin/<?php echo $rresult['image'] ;?>" alt=""></a>
                                        <a href="single.php?id=<?php echo $rresult['id']; ?>"><h5><?php echo $format->shortText($result['title'], 15 ); ?></h5></a>
                                    </div>
                                    <?php } }else{ echo 'Related Post Not Available!!';} ?>
                                </div>
                            </div>
                            

                        </div>
                        
                         <?php } }?>               
                    </div>
                </div>

                <?php include 'inc/sidebar.php'; ?>
                <?php include 'inc/footer.php'; ?>

