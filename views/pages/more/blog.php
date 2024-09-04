<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if session is active and user data is set
if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $img = isset($_SESSION['photo']) ? $_SESSION['photo'] : '';

    include '../../../config/config.php';
    include '../components/header.php';
?>
    <main class="wrapper">
        <?php include '../components/header_page.php'; ?>
        
        <section class="content">
            <?php include '../components/navbar.php'; ?>
            <article class="article">
                <?php include 'moreBlogs.php';?>
            </article>
            
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set the page as home in a JavaScript variable
            window.isblogsPage = true;
            
            // Apply the background color if this is the home page
            if (window.isblogsPage) {
                let blogs = document.getElementById('blog');
                if (blogs) {
                    blogs.style.backgroundColor = "#5D6D7E";
                }
            }
        });
    </script>
<?php
    include '../components/footer.php';
} else {
    header("Location: http://localhost/ip_project");
    exit();
}
?>