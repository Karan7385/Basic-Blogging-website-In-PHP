<?php
    require_once '../../../models/Blogs_fetch_model.php';
    $tutorials = new Blogs_model();
    $tutorialsArray = $tutorials->fetchAll("tutorials");
    $tutorialsArrayJson = json_encode($tutorialsArray);
?>

<div class="container-tut">
    <h1 class="title">TUTORIALS</h1>
    <div class="search">
        <input type="search" name="search" id="search" data-tutorials-var='<?php echo htmlspecialchars($tutorialsArrayJson, ENT_QUOTES, 'UTF-8'); ?>' placeholder="Search the tutorials title">
    </div>

    <div class="search-hint"></div>

    <div class="row-tut">
        <?php
            $tutorialsRecentArrayReversed = array_reverse($tutorialsArray); 
            foreach ($tutorialsRecentArrayReversed as $b) { ?>
            <div class="card-tutorials" id="<?php echo $b['id'];?>">
                <div class="post-date"><b>POSTED AT: <?php echo $b['created_at'];?></b></div>
                <h1 class="card-title-tut"><?php echo $b['title'];?></h1>
                <h3 class="card-description-tut">"<?php echo $b['shortDescription'];?>"</h3>
                <div class="fakeimg-tut">
                    <video class="tutorial-video" controls autoplay loop>
                        <source src="<?php echo $base_url . '/assets/tutorials/' . $b['video'];?>" type="video/mp4">
                        <source src="<?php echo $base_url . '/assets/tutorials/' . $b['video'];?>" type="video/ogg">
                    </video>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script src="<?php echo $base_url?>/assets/javascript/pages/more/tutorialsSearchbar.js"></script>