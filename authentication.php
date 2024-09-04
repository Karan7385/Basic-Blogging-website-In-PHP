<div class="blur-bg-overlay"></div>

<div class="form-popup">
    <span class="close-btn material-symbols-rounded">close</span>
    <div class="form-box login">
        <div class="form-details">
            <h2>WELCOME BACK</h2>
            <h6>PLEASE SIGN IN USING YOUR PERSONAL INFORMATION TO STAY CONNECTED WITH US.</h6>
        </div>
        <div class="form-content">
            <h2>SIGN IN</h2>

            <form action="<?php echo $base_url . '/controllers/authentication_handling.php';?>" method="POST">
                <input type="hidden" name="action" value="login">
                <div class="input-field">
                    <input type="email" name="email" required>
                    <label>Email Address</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="input-field">
                    <select name="contentType" id="contentType">
                        <option style="color: black;" value="">Select who you are?</option>
                        <?php
                            require 'config/database.php';
                            require 'assets/helpers/helpers.php';
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
                            <option value="<?php echo $content[$i];?>"><?php echo $content[$i];?></option>
                        <?php } ?>
                    </select>
                </div>
                <a href="<?php echo $base_url . "/forgot_password.php"?>" class="forgot-pass-link">Forgot password?</a>
                <button type="submit">LOG IN</button>
            </form>

            <div class="bottom-link">
                Don't have an account?
                <a href="#" id="signup-link">SIGN UP</a>
            </div>
        </div>
    </div>

    <div class="form-box signup">
        
        <div class="form-details">
            <h2>CREATE ACCOUNT</h2>
            <h6>TO BECOME A PART OF OUR COMMUNITY, PLEASE SIGN UP USING YOUR PERSONAL INFORMATION.</h6>
        </div>
        <div class="form-content">
            <h2>SIGN UP</h2>

            <form action="<?php echo $base_url . '/controllers/authentication_handling.php'; ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="register">
                <div class="input-field">
                    <input type="text" name="name" required>
                    <label>Your Name</label>
                </div>
                <div class="input-field">
                    <input type="email" name="email" required>
                    <label>Your Email Address</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" required>
                    <label>Create Your Password</label>
                </div>
                <div class="input-field">
                    <input type="number" name="mobile" maxlength="10" required>
                    <label>Mobile Number</label>
                </div>
                <div class="input-field">
                    <input type="file" name="photo" required>
                </div>
                <button type="submit">SIGN UP</button>
            </form>

            <div class="bottom-link">
                Already have an account?
                <a href="#" id="login-link">Login</a>
            </div>
        </div>
    </div>
</div>