<?php
    require_once '../../../models/Blogs_fetch_model.php';
    $blog = new Blogs_model();
    $blogArray = $blog->fetchAll("blogs");
    $blogArrayJson = json_encode($blogArray);
?>

<div class="container-blog">
    <h1 class="title">BLOGS</h1>
    <div class="search">
        <input type="search" name="search" id="search" data-blog-var='<?php echo htmlspecialchars($blogArrayJson, ENT_QUOTES, 'UTF-8'); ?>' placeholder="Search the blogs title">
    </div>

    <div class="search-hint"></div>

    <div class="row-blog">
        <?php
            $blogRecentArrayReversed = array_reverse($blogArray); 
            foreach ($blogRecentArrayReversed as $b) { ?>
            <div class="card-blog" id="<?php echo $b['id'];?>">
                <div class="post-date-blog">POSTED AT: <?php echo $b['created_at'];?></div>
                <h1 class="card-title-blog"><?php echo $b['title'];?></h1>
                <h3 class="card-description-blog">"<?php echo $b['shortDescription'];?>"</h3>
                <div class="fakeimg-blog" style="background-image: url('<?php echo $base_url . '/assets/blogs/' . $b['images'];?>');">
                </div>
                <pre class="pre-text-blog"><?php echo $b['descriptions']; ?></pre>
            </div>
        <?php } ?>
    </div>
</div>

<script src="<?php echo $base_url?>/assets/javascript/pages/more/blogsSearchbar.js"></script>