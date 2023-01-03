<?php include 'inc/header.php' ?>
<?php

    if(!isset($_GET['pageid']) OR $_GET['pageid'] == NULL ){
        echo 'Data Not Found!!';
    }
    else{
        $id = $_GET['pageid'];
    }
        
?>




        <div class="body">
            <div class="row">
                <div class="col-md-8">
                    <div class="post_list">
                        <?php 
                             $query = "SELECT * FROM blog_page WHERE id='$id'";
                             $page = $db->select($query);
                             if($page){
                                while($result = $page->fetch_assoc()){
                        ?>
                        <div class="post_item">
                            <h3 class="about_title"><?php echo $result['name'] ?></h3>
                            
                            <div class="img_dis">
                                <p><?php echo $result['body'] ?></p>
                            </div>
                        </div>
                        <?php } }?>
                        
                    </div>
                </div>

                <?php include 'inc/sidebar.php' ?>
                <?php include 'inc/footer.php' ?>

