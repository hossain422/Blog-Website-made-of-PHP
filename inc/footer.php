
        <footer>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="">Privacy Policy</a></li>
            </ul>
                    <?php
                        $query = "SELECT * FROM blog_copyright WHERE id = '1' ";
                        $copyright = $db->select($query);
                        if($copyright){
                            while($result = $copyright->fetch_assoc()){
                    ?>
            <p>&copy; Copyright<?php echo $result['copyright']; ?> <?php echo date(' Y') ?></p>
            <?php } }?>
        </footer>
    </div>


    <script type="text/javascript" src="js/scrolltop.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
</body>
</html>