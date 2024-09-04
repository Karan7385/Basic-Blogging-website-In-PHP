<?php include 'config/config.php' ?>

<?php include 'header.php' ?>
  
  <?php include 'navbar.php' ?>

    <div class="container">
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">Fr. CRCE, Bandra</div>
                    <div class="text-two">Mumbai, Maharashtra</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">+91 738 525 6977</div>
                    <div class="text-two">+91 887 920 8645</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">karanvishwakarma7385@gmail.com</div>
                    <div class="text-two">crce.9937.ce@gmail.com</div>
                </div>
            </div>
            <div class="right-side">
                <div class="topic-text">Send us a message</div>
                <p style="color: white;">For any queries or updates, please contact us. We are here to assist you with any questions or concerns.</p>
                <!-- <form action="#"> -->
                    <p id="msg"></p>
                    <div class="input-box">
                        <input type="text" id="name" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <input type="email" id="email" placeholder="Enter your email">
                    </div>
                    <div class="input-box message-box">
                        <textarea type="text" id="message" placeholder="Enter your message"></textarea>
                    </div>
                    <div class="button">
                        <input type="button" onclick="sendMail()" value="Send Now">
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
  
<?php include 'footer.php' ?>