<?php
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', trim($uri_path, '/'));
    $last_segment = end($uri_segments);
    
    if (!empty($last_segment)) {
        $msg = urldecode($last_segment);
    } else {
        $msg = '';
    }
?>

<div class="content">
    <?php if($msg != '' && $msg == "Tutorials added successfully") { ?>
    <div class="alert" style="background-color: #04AA6D; padding: 1rem; color: white; opacity: 1; transition: opacity 0.6s; border-radius: 5rem; cursor: pointer;">
        <span class="closebtn">&times;</span> 
        
        <strong><?php echo $msg;?>.</strong>
    </div>
    <?php }?>

    <?php include 'header_page.php'; ?>
    <div class="container">
        <div class="row">
            <h1 style="font-family: Times New Roman;">ADD TUTORIALS ON GEN AI</h1>
            <div class="col-md-12">
                <form id="tutorialsForm" action="<?php echo $base_url;?>/controllers/creators/handleSubmit_controller.php" method="POST" enctype="multipart/form-data" onsubmit="return tutorialsSubmit(event)">
                    <input type="hidden" name="type" value="tutorials">
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Add tutorials title" />
                        <div class="err_msg" id="titleError" style="display: none; color: red; font-weight: bold;">Tutorial title is required</div>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="shortDescription" name="shortDescription" placeholder="Add Short Description (in 100 characters)" maxlength="200" />
                        <div class="err_msg" id="shortDescriptionError" style="display: none; color: red; font-weight: bold;">Short Description is required</div>
                    </div>

                    <div class="form-group">
                        <label>Videos</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary btn-file" style="z-index: 1">
                                    Browse <input type="file" id="video" name="video">
                                </span>
                            </span>
                            <input type="text" class="form-control" id="readonlyVideo" readonly>
                        </div>
                        <div class="err_msg" id="videoError" style="display: none; color: red; font-weight: bold;">Video is required</div>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" name="Submit" value="Publish" class="btn btn-primary form-control" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>