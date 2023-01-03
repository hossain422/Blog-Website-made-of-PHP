<?php
    include 'inc/connect.php';
    include 'inc/Database.php';
    include 'help/Format.php';

    $format = new Format();
    $db = new Database();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE;?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
    
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            effect:'random',
            slices:10,
            animSpeed:500,
            pauseTime:5000,
            startSlide:0, //Set starting Slide (0 index)
            directionNav:false,
            directionNavHide:false, //Only show on hover
            controlNav:false, //1,2,3...
            controlNavThumbs:false, //Use thumbnails for Control Nav
            pauseOnHover:true, //Stop animation while hovering
            manualAdvance:false, //Force manual transitions
            captionOpacity:0.8, //Universal caption opacity
            beforeChange: function(){},
            afterChange: function(){},
            slideshowEnd: function(){} //Triggers after all slides have been shown
        });
    });
    </script>
</head>
<body>
    <div class="container">
        <header>
            <div class="row">
                    <?php
                        $query = "SELECT * FROM blog_sitetitle WHERE id = '1' ";
                        $sitetitle = $db->select($query);
                        if($sitetitle){
                            while($result = $sitetitle->fetch_assoc()){
                    ?>
                <div class="col-md-1 text-center">
                    <div class="logo_img">
                        <a href="index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-md-7">
                    
                    <div class="logo_title mt-2 mb-0">
                        <a href="index.php"><h2><?php echo $result['title']; ?></h2></a>
                        
                        <p><?php echo $result['description']; ?></p>
                    </div>
                </div>
                <?php } }?>
                <div class="col-md-4">
                    <?php
                        $query = "SELECT * FROM blog_social WHERE id = '1' ";
                        $sitetitle = $db->select($query);
                        if($sitetitle){
                            while($result = $sitetitle->fetch_assoc()){
                    ?>
                    <div class="social">
                        <a href="<?php echo $result['fb'] ?>" name="fb"><i class="fa fa-facebook"></i></a>
                        <a href="<?php echo $result['twt'] ?>"><i class="fa fa-twitter" name="twt"></i></a>
                        <a href="<?php echo $result['link'] ?>"><i class="fa fa-linkedin" name="link"></i></a>
                        <a href="<?php echo $result['google'] ?>"><i class="fa fa-google" name="google"></i></a>
                    </div>
                    <?php } }?>
                    <div class="search d-inline-flex">
                        <form action="search.php" class="d-inline-flex">
                            <input type="text" name="search" value="" placeholder="Search Keyword..">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                      </li>
                        <?php
                            $query = "SELECT * FROM blog_page";
                            $page = $db->select($query);
                            if($page){
                                while($result = $page->fetch_assoc()){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="page.php?pageid=<?php echo $result['id'] ?>"><?php echo $result['name'] ?></a>
                        </li>
                        <?php } }?>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li> 
                    </ul>
                  </div>
                </div>
              </nav>
        </header>
