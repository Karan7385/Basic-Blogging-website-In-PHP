<?php
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', trim($uri_path, '/'));
    $last_segment = end($uri_segments);
    
    if (!empty($last_segment)) {
        $msg = urldecode($last_segment);
    } else {
        $msg = '';
    }
    
    echo $msg;
?>

<div class="content">
    <?php if($msg != '' && $msg == "Tools added successfully") { ?>
    <div class="alert" style="background-color: #04AA6D; padding: 1rem; color: white; opacity: 1; transition: opacity 0.6s; border-radius: 5rem; cursor: pointer;">
        <span class="closebtn">&times;</span> 
        
        <strong><?php echo $msg;?>.</strong>
    </div>
    <?php }?>

    <?php include 'header_page.php'; ?>
    <div class="container">
        <div class="row">
            <h1 style="font-family: Times New Roman;">ADD TRENDING AI TOOLS</h1>
            <div class="col-md-12">
                <form id="toolsForm" action="<?php echo $base_url;?>/controllers/creators/handleSubmit_controller.php" method="POST" enctype="multipart/form-data" onsubmit="return toolsSubmit(event)">
                    <input type="hidden" name="type" value="tools">
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="toolName" name="toolName" placeholder="Add AI Tool Name" />
                        <div class="err_msg" id="toolNameError" style="display: none; color: red; font-weight: bold;">AI Tool Name is required</div>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="shortDescription" name="shortDescription" placeholder="Add Short Description (in 100 characters)" maxlength="100" />
                        <div class="err_msg" id="shortDescriptionError" style="display: none; color: red; font-weight: bold;">Short Description is required</div>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary btn-file" style="z-index: 1">
                                    Browse <input type="file" id="image" name="image">
                                </span>
                            </span>
                            <input type="text" class="form-control" id="readonlyImage" readonly>
                        </div>
                        <div class="err_msg" id="imageError" style="display: none; color: red; font-weight: bold;">Image is required</div>
                    </div>
                    
                    <div class="form-group">
                        <textarea class="form-control bcontent" id="description" name="description" rows="6"></textarea>
                        <div class="err_msg" id="descriptionError" style="display: none; color: red; font-weight: bold;">News is required</div>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" name="Submit" value="Publish" class="btn btn-primary form-control" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>