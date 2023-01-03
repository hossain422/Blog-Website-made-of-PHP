<?php include 'inc/header.php' ?>

<?php

if(!isset($_GET['search']) OR $_GET['search'] == NULL ){
    echo 'Data Not Found!!';
}
else{
    $search = $_GET['search'];
}


    
    $query = "SELECT * FROM blog_post WHERE title LIKE '%$search%' OR body LIKE '%$search%' ";
    $post = $db->select($query);
    
?>



        
        <div class="body">
            <div class="row">
                <div class="col-md-8">
                    <div class="post_list">
                        <?php 
                            if($post){
                                while($result = $post->fetch_assoc()){
                        ?>
                        <div class="post_item">
                            <a href="single.php?id=<?php echo $result['id']; ?>"><h3><?php echo $result['title'] ?></h3></a>
                            <div class="date_author mb-2 d-inline-flex">
                                <div class="date"><?php echo $format->dateFormat($result['date']); ?></div>
                                <div class="author mx-1"> By <a href=""><?php echo $result['author'] ?></a></div>
                            </div>
                            <div class="img_dis">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="list_img">
                                            <a href="single.php?id=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image'] ;?>" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="discrip">

                                            <p class="m-0"><?php echo $format->shortText($result['body']); ?></p>

                                            <a href="single.php?id=<?php echo $result['id']; ?>" class="btn">Read More</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <?php }else{ echo '<h4>Your Search Data is not Found !!</h4>';} ?>
                    </div>
                </div>


                <?php include 'inc/sidebar.php' ?>
                <?php include 'inc/footer.php' ?>

