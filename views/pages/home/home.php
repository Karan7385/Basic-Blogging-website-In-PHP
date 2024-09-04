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
            <?php include '../components/article.php'; ?>
            
        </section>
            
        <!-- <footer class="footer">
            Footer
        </footer> -->
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set the page as home in a JavaScript variable
            window.isHomePage = true;
            
            // Apply the background color if this is the home page
            if (window.isHomePage) {
                let home = document.getElementById('home');
                if (home) {
                    home.style.backgroundColor = "#3C5A7C";
                }
            }
        });
    </script>
<?php
    include '../components/footer.php';
} else {
    header("Location: ../../../index.php");
    exit();
}
?>