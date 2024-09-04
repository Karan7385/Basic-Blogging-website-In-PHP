<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $img = isset($_SESSION['photo']) ? $_SESSION['photo'] : '';

    include '../../config/config.php';
    include 'header.php';
?>

    <div class="section">
        <?php include 'sidebar.php'; ?>
        <?php include 'tutorials-addForm.php'; ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.isTutorialsPage = true;
            if (window.isTutorialsPage) {
                let tutorials = document.getElementById('tutorials');
                if (tutorials) {
                    tutorials.style.backgroundColor = "#3C5A7C";
                }
            }
        });

        var close = document.getElementsByClassName("closebtn");
        var i;

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }
    </script>
    <script src="<?php echo $base_url; ?>/assets/javascript/creators/tutorials-addForm.js"></script>

<?php
    include 'footer.php';
} else {
    header("Location: http://localhost/ip_project");
    exit();
}
?>