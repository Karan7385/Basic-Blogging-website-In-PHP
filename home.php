<?php
  /* This PHP code snippet is primarily dealing with retrieving and decoding URL parameters from the
  GET request. */
  $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
  $status = isset($_GET['status']) ? $_GET['status'] : '';

  $decoded_msg = urldecode($msg);
  $decoded_status = urldecode($status);
?>

<?php if($msg != '') { ?>
  <div class="alert" style="background-color: <?php if($decoded_status === '0'){echo "#04AA6D";} else {echo "#f44336";}?>">
    <span class="closebtn">&times;</span> 
    
    <strong><?php if($decoded_status === '0'){echo "Success!";} else {echo "ERROR!";}?></strong> <?php echo $decoded_msg;?>.
  </div>
<?php }?>

<section class="hero-section">
  <div class="hero">
    <h2>Rising of Generative AI</h2>
    <p style="text-align: justify">
      The rise of generative AI marks a revolution in technology, enabling machines to create content autonomously, from
      text and images to music and code, driving innovation, enhancing creativity, and transforming industries with
      unprecedented efficiency and personalization.
    </p>
    <div class="buttons">
      <a href="<?php echo $base_url . '/joinNow.php'; ?>" class="join">JOIN NOW</a>
      <a href="https://platform.openai.com/docs/overview" class="learn">LEARN MORE</a>
    </div>
  </div>

  <div class="wrapper">
    <div class="outer">
      <?php
        /* Database retrieval */
        $connect = new Database();
        $mysqli = $connect->con;
        $stmt = $mysqli->prepare("SELECT name, photo, contentType FROM creators ORDER BY created_at DESC LIMIT 4");
        if ($stmt->execute()) {
          $stmt->bind_result($name, $photo, $contentType);
          $creator_data = [];
          while ($stmt->fetch()) {
            $creator_data[] = [
              'name' => $name,
              'photo' => $photo,
              'contentType' => $contentType
            ];
          }  
          $stmt->close();
        }
      ?>

      <?php 
        /* This code snippet is iterating over the `` array and generating HTML content
        dynamically for each creator. */
        $i = -1;
        if($i < 5) {
          foreach ($creator_data as $creator) { ?>
            <div class="card" style="--delay:<?php echo $i++; ?>;">
              <div class="content">
                <div class="img">
                  <img src="http://localhost/ip_project/assets/uploads/<?php echo $creator['photo']; ?>" alt="<?php echo $creator['photo']; ?>">
                </div>
                <div class="details">
                  <span class="name"><?php echo $creator['name']; ?></span>
                  <p><?php echo $creator['contentType'];?></p>
                </div>
              </div>
              <a href="#">Follow</a>
            </div>
        <?php 
          }
        }
        ?>
      
    </div>
  </div>
</section>