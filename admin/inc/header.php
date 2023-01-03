<?php
    include '../inc/Session.php';
    Session::checkSession();
    
?>
<?php
    include '../inc/connect.php';
    include '../inc/Database.php';
    include '../help/Format.php';

    $format = new Format();
    $db = new Database();
    $userrole = Session::get('userRole');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="container-fluid">
        <header>
            <div class="row">
                <div class="col-md-1">
                    <div class="logo">
                        <a href="index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="logo_title">
                        <a href="index.php"><h2>Traning With Live Project</h2></a>
                        <p>www.nazmulhossain422.epizy.com</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <?php
                        if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                          Session::destroy();
                        }
                    ?>
                    <div class="admin_logout d-inline-flex">
                        <a href="profile.php"><i class="fa fa-user"></i></a>
                        <a href="profile.php"><p>Hello, 
                          <?php
                            $query = "SELECT * FROM blog_user where role = '$userrole'";
                            $user = $db->select($query);
                            if($user){
                            while($result = $user->fetch_assoc()){ ?>
                              <?php echo $result['username'].' '; ?>||
                          <?php }} ?></p></a>

                        <a href="profile.php"><span>Config</span></a> 
                        <span class="text-light mx-1">|| </span>
                        <a href="?action=logout"> Logout</a>
                    </div>
                </div>
            </div>
        </header>
        <nav class="navbar menu navbar-expand-lg navbar-light p-0">
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="profile.php"><i class="fa fa-user-circle"></i> User Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="inbox.php"><i class="fa fa-inbox"></i>Inbox
                        <?php
                           $query = "SELECT * FROM blog_contact WHERE status = '0' order by id desc";
                           $notification = $db->select($query);
                           if($notification){
                             $count = mysqli_num_rows($notification);
                             echo '(<span class="text-danger"> '.$count.' </span>)';
                           }
                           else{
                             echo '(<span class="text-danger"> 0 </span>)';
                           }
                        ?>
                  </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="changepassword.php"><i class="fa fa-key"></i>Change Password</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-globe"></i>Visit Website</a>
                  </li>
                  
                </ul>
              </div>
            </div>
        </nav>
