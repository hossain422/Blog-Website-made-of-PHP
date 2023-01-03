
<?php include 'inc/header.php' ?>





        <div class="body">
            <div class="row">
                <div class="col-md-8">
                    <div class="post_list">
                        <div class="post_item">
                            <h3 class="about_title">Contact</h3>
                            
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="contact">
                                        <?php
                                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                                $name = $format->validation($_POST['name']);
                                                $email = $format->validation($_POST['email']);
                                                $subject = $format->validation($_POST['subject']);
                                                $message = $format->validation($_POST['message']);
                
                                                $name = mysqli_real_escape_string($db->link, $name);
                                                $email = mysqli_real_escape_string($db->link, $email);
                                                $subject = mysqli_real_escape_string($db->link, $subject);
                                                $message = mysqli_real_escape_string($db->link, $message);

                                                if(empty($name)){
                                                    echo '<h5 class="text-danger">Your Name must not be Empty !!</h5>';
                                                }
                                                elseif(empty($email)){
                                                    echo '<h5 class="text-danger">Your Email must not be Empty !!</h5>';
                                                }
                                                elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                                    echo '<h5 class="text-danger">Invalid Email Address !!</h5>';
                                                }
                                                elseif(empty($subject)){
                                                    echo '<h5 class="text-danger">Your Subject must not be Empty !!</h5>';
                                                }
                                                elseif(empty($message)){
                                                    echo '<h5 class="text-danger">Your Message must not be Empty !!</h5>';
                                                }
                                                else{
                                                    $query = "INSERT INTO blog_contact(name, email, subject, message) VALUES('$name', '$email', '$subject', '$message')";
                                                    $insert_contact = $db->insert($query);
                                                    if($insert_contact){
                                                        echo '<h5 class="text-success">Message Send is Successfully!</h5>';
                                                    }
                                                    else{
                                                        echo '<h5 class="text-danger">Message Sending Fail !!</h5>';
                                                    }
                                                }
                                            }
                                        ?>  
                                        
                                        <form action="" method="POST">
                                            <label for="">Full Name</label>
                                            <input type="text" name="name">
                                            <label for="">Email</label>
                                            <input type="email" name="email">
                                            <label for="">Subject</label>
                                            <input type="text" name="subject">
                                            <label for="">Message</label>
                                            <textarea name="message" id="" cols="30" rows="10"></textarea>
                                            <button type="submit" name="send">Send Message</button>
                                        </form>
                                        
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>

                <?php include 'inc/sidebar.php' ?>
                <?php include 'inc/footer.php' ?>

