<?php include 'config/config.php' ?>
<?php include 'header.php' ?>

    <div class="form-box login" style="width: 50%; margin: auto;">
        <div class="form-content" style="color: white">
            <div style="display: flex; justify-content: center; margin-bottom: 3rem;">
                <img src="<?php echo $base_url;?>/assets/images/1.jpg" alt="Logo" width=200 style="border-radius: 0.8rem;">
            </div>
            
            <h2>RESET YOUR PASSWORD</h2>
            
            <form action="<?php echo $base_url . '/controllers/authentication_handling.php'; ?>" method="POST">
                <input type="hidden" name="action" value="forgot_password">
                <div class="input-field">
                    <input type="email" name="email" required style="color: white">
                    <label style="color: white">Email Address</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" required style="color: white">
                    <label style="color: white">Create New Password</label>
                </div>
                <div class="input-field">
                    <select name="contentType" id="contentType" style="color: white">
                        <option style="color: black;" value="">Select Who You Are?</option>
                        <?php
                            require_once 'config/database.php';
                            require_once 'assets/helpers/helpers.php';

                            $connect = new Database();
                            $mysqli = $connect->con;
                            $stmt = $mysqli->prepare("SELECT contentType FROM creators");
                            if ($stmt->execute()) {
                                $stmt->bind_result($contentType);
                                $content = [];
                                while ($stmt->fetch()) {
                                    $content[] = $contentType;
                                }
                                $stmt->close();
                            }
                        ?>
                        <?php for($i = 0; $i < count($content); $i++) {?>
                            <option style="color: black" value="<?php echo $content[$i];?>"><?php echo $content[$i];?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit">CHANGE PASSWORD</button>
            </form>
        </div>
    </div>

<?php include '../footer.php' ?>