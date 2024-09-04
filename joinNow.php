<?php include 'config/config.php' ?>
<?php include 'header.php' ?>

<div style="height: 5rem"></div>

<div style="width: 50%; margin: auto; color: white;">
    <h2 style="text-align: center">!! JOIN AS CREATOR !!</h2>

    <form action="<?php echo $base_url . '/controllers/authentication_handling.php'; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="creator">
        <div class="input-field">
            <input type="text" name="name" style="color: white;" required>
            <label style="color: white;">Your Name</label>
        </div>
        <div class="input-field">
            <input type="email" name="email" style="color: white;" required>
            <label style="color: white;">Email Address</label>
        </div>
        <div class="input-field">
            <input type="password" name="password" style="color: white;" required>
            <label style="color: white;">Create Your Password</label>
        </div>
        <div class="input-field">
            <input type="number" name="mobile" style="color: white;" max-length=10 required>
            <label style="color: white;">Your Mobile Number</label>
        </div>
        <div class="input-field">
            <input type="text" name="contentType" style="color: white;" required>
            <label style="color: white;">Your Blog Type</label>
        </div>
        <div class="input-field">
            <input type="file" name="photo" style="color: white;" required>
        </div>
        <button type="submit">JOIN US</button>
    </form>
</div>

