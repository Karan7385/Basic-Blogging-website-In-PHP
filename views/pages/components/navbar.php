<aside class="sidebar">
    <div class="navbar">
        <div class="hamburger" onclick="toggleMenu()">&#9776;</div>
        <ul class="nav">
            <li class="nav-links">
                <a href="<?php echo $base_url;?>/views/pages/home/home.php" id="home">HOME</a>
            </li>
            <li class="nav-links">
                <a href="<?php echo $base_url;?>/views/pages/resources/tutorials.php" id="tutorials">TUTORIALS</a>
            </li>
            <li class="nav-links">
                <a href="#" onclick="toggleDropdown(event)">MORE</a>
                <ul class="dropdown-content">
                    <li><a href="<?php echo $base_url;?>/views/pages/more/blog.php" id="blog">BLOGS</a></li>
                    <li><a href="<?php echo $base_url;?>/views/pages/more/news.php" id="news">NEWS</a></li>
                    <li><a href="<?php echo $base_url;?>/views/pages/more/tools.php" id="tools">TRENDING TOOLS</a></li>
                </ul>
            </li>
            <li class="nav-links">
                <a href="<?php echo $base_url;?>/controllers/call_signout.php">SIGN OUT</a>
            </li>
        </ul>
    </div>
</aside>

