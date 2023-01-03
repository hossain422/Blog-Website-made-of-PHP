<?php include 'inc/header.php' ?>
<?php include 'inc/slider.php' ?>

<?php

    $per_page = 4;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 1;
    }
    $start_form = ($page-1) * $per_page;



    
    $query = "SELECT * FROM blog_post limit $start_form, $per_page";
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
                        <?php
                            $query = 'SELECT * FROM blog_post';
                            $result = $db->select($query);
                            $total_row = mysqli_num_rows($result);
                            $total_pages = ceil($total_row/$per_page); 
                        
                        echo '<p class="pagination"><a href="index.php?page=1"> First Page </a> ' ;
                            for($i=1; $i <= $total_pages; $i++){
                                echo '<a href="index.php?page='.$i.'">'.$i.'</a>';
                            }
                        echo ' <a href="index.php?page='.$total_pages.'"> Last Page</a> </p>' ;?>
                        <?php } ?>
                    </div>
                </div>


                <?php include 'inc/sidebar.php' ?>
                <?php include 'inc/footer.php' ?>

