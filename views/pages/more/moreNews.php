<?php
    require_once '../../../models/Blogs_fetch_model.php';
    $news = new Blogs_model();

    $newsArray = $news->fetchAll("news");
    $newsArrayJson = json_encode($newsArray);
?>
    <div class="container-news">
        <h1 class="title">NEWS</h1>
        <div class="search">
            <input type="search" name="search" id="searchNews" data-news-var='<?php echo htmlspecialchars($newsArrayJson, ENT_QUOTES, 'UTF-8'); ?>' placeholder="Search the news heading">
        </div>

        <div class="search-hint"></div>

        <div class="row-news">
            <?php
                $newsRecentArrayReversed = array_reverse($newsArray);
                foreach($newsRecentArrayReversed as $b) { ?>
                <div class="card-news" id="<?php echo $b['id'];?>">
                    <div class="post-date-news"><span class="post-date-label"><b>POSTED AT: </b></span> <?php echo $b['created_at'];?></div>
                    <h1 class="card-title-news"><?php echo $b['headline'];?></h1>

                    <h3 class="card-description-news"><?php echo $b['shortDescription'];?></h3>
                    <div class="fakeimg-news" style="background-image: url('<?php echo $base_url . '/assets/news/' . $b['image'];?>');"></div>
                    <pre class="pre-text-news"><?php echo $b['newss']; ?></pre>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="<?php echo $base_url?>/assets/javascript/pages/more/newsSearchbar.js"></script>