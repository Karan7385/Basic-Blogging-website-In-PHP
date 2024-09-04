<header>
    <nav class="navbar">
        <span class="hamburger-btn material-symbols-rounded">menu</span>
        <a href="<?php echo $base_url;?>/" class="logo">
            <img src="<?php echo $base_url?>/assets/images/1.jpg" alt="logo">
            <h2>GenAI RISE</h2>
        </a>
        <ul class="links">
            <span class="close-btn material-symbols-rounded">close</span>
            <li><a href="<?php echo $base_url;?>/">HOME</a></li>
            <li><a href="<?php echo $base_url;?>/views/pages/resources/tutorials.php">RESOURCES</a></li>
            <li><a href="<?php echo $base_url;?>/views/pages/more/blog.php">BLOGS</a></li>
            <li><a href="about.php">ABOUT US</a></li>
            <li><a href="contact.php">CONTACT US</a></li>
        </ul>
        <button class="login-btn">LOG IN</button>
    </nav>
</header>

<?php include 'authentication.php' ?>0