<?php include '../../config/config.php' ?>
<?php include '../../header.php' ?>

<style>
    body {
        * {
            margin: 0;
            padding: 0;
            outline: none;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body{
            height: 100vh;
            background: -webkit-repeating-linear-gradient(-45deg, #71b7e6, #69a6ce, #b98acc, #ee8176, #b98acc, #69a6ce, #9b59b6);
            background-size: 400%;
        }
    }
</style>

<div id="error-page" style="background-color: black">
    <div class="content">
        <?php
            $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_segments = explode('/', $uri_path);
            $msg = urldecode($uri_segments[5]);
            $status_code = urldecode($uri_segments[6]);
        ?>
        <h2 class="header" data-text="<?php echo $status_code; ?>">
            <?php echo $status_code?>
        </h2>
        <h4 data-text="<?php echo $msg; ?>" style="color: red;">
            <?php echo $msg; ?>
        </h4>
        <div class="btns">
            <a href="<?php echo $base_url?>/">RETURN HOME</a>
        </div>
    </div>
</div>
<?php include '../../footer.php' ?>