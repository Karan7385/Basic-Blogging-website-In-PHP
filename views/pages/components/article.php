<?php
    require_once '../../../models/Blogs_fetch_model.php';

    $blog = new Blogs_model();
    $blogRecentArray = $blog->fetchRecent("blogs");
    $newsRecentArray = $blog->fetchRecent("news");
    $toolsRecentArray = $blog->fetchRecent("tools");
?>

<article class="article">
    <div class="container">
        <div class="cards">
            <div class="top-blogs border top-blogs-custom">
                TOP BLOGS <br>
                <h1><?php echo count($blogRecentArray); ?></h1>
            </div>
            <div class="top-news border top-news-custom">
                TOP NEWS <br>
                <h1><?php echo count($newsRecentArray); ?></h1>
            </div>
            <div class="top-tools border top-tools-custom">
                TOP TRENDING TOOLS <br>
                <h1><?php echo count($toolsRecentArray); ?></h1>
            </div>
        </div>

        <div class="row">
            <div class="leftcolumn">
                <h1 class="section-title">TOP BLOGS</h1>
                <?php
                    $blogRecentArrayReversed = array_reverse($blogRecentArray);
                    foreach($blogRecentArrayReversed as $b) { ?>
                    <div class="card">
                        <h2><?php echo $b['title']; ?></h2>

                        <h5>"<?php echo $b['shortDescription'] . ', ' . $b['shortDescription']; ?>"</h5>

                        <div class="fakeimg" style="background-image: url('<?php echo $base_url . '/assets/blogs/' . $b['images']; ?>');"></div>

                        <pre class="pre-text"><?php echo $b['descriptions']; ?></pre>
                    </div>
                <?php } ?>
            </div>

            <div class="rightcolumn">
                <h1 class="section-title">TOP NEWS</h1>
                <?php 
                    $newsRecentArrayReversed = array_reverse($newsRecentArray);
                    foreach($newsRecentArrayReversed as $n) { ?>
                        <div class="card">
                            <h4><?php echo $n['headline']; ?></h4>
                            <div class="fakeimgRight" style="background-image: url('<?php echo $base_url . '/assets/news/' . $n['image']; ?>');">
                            </div>
                            <pre class="pre-text"><?php echo $n['shortDescription']; ?></pre>
                        </div>
                    <?php } ?>

                    <h1 class="section-title">TOP AI TOOLS</h1>
                    <?php 
                        $toolsRecentArrayReversed = array_reverse($toolsRecentArray);
                        foreach($toolsRecentArrayReversed as $n) { ?>
                            <div class="card">
                                <h4><?php echo $n['toolName']; ?></h4>
                                <div class="fakeimgRight" style="background-image: url(<?php echo $base_url . '/assets/tools/' . $n['image']; ?>" alt="<?php echo $n['image']; ?>)">
                                </div>
                            </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</article>