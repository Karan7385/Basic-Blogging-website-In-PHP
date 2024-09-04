<?php

    require_once 'Blog_controller.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'blog') {
        $blog = new Blogs();
        $blog -> blogInsert();
    } else if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'news') {
        $blog = new Blogs();
        $blog -> newsInsert();
    } else if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'tools') {
        $blog = new Blogs();
        $blog -> toolsInsert();
    } else if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'tutorials') {
        $blog = new Blogs();
        $blog -> tutorialsInsert();
    }

?>