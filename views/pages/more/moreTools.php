<?php
    require_once '../../../models/Blogs_fetch_model.php';
    $tools = new Blogs_model();

    $toolsArray = $tools->fetchAll("tools");
    $toolsArrayJson = json_encode($toolsArray);
?>
    <div class="container-tools">
        <h1 class="title-tools">AI TOOLS</h1>
        <div class="search">
            <input type="search" name="search" id="search" data-tools-var='<?php echo htmlspecialchars($toolsArrayJson, ENT_QUOTES, 'UTF-8'); ?>' placeholder="Search the AI tools title">
        </div>

        <div class="search-hint"></div>

        <div class="row-tools">
            <?php
                $toolsRecentArrayReversed = array_reverse($toolsArray);
                foreach($toolsRecentArrayReversed as $b) { ?>
                <div class="card-tools" id="<?php echo $b['id'];?>">
                    <div class="post-date-tools"><span class="post-date-label"><b>POSTED AT: </b></span> <?php echo $b['created_at'];?></div>
                    <h1 class="card-title-tools"><?php echo $b['toolName'];?></h1>

                    <h3 class="card-description-tools">"<?php echo $b['shortDescription'];?>"</h3>
                    <div class="fakeimg-tools" style="background-image: url('<?php echo $base_url . '/assets/tools/' . $b['image'];?>');"></div>
                    <pre class="pre-text-tools"><?php echo $b['descriptions']; ?></pre>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="<?php echo $base_url?>/assets/javascript/pages/more/toolsSearchbar.js"></script>