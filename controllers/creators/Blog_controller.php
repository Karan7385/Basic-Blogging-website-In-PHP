<?php
require_once '../../models/Blogs_model.php';
require_once '../../assets/helpers/helpers.php';

class Blogs {
    private $blogs_model;
    
    public function __construct() {
        $this->blogs_model = new Blogs_model();
    }

    public function blogInsert() {
        $blogs_data = $_POST;
        $file = $_FILES;

        if (isset($blogs_data) && !empty($blogs_data) && isset($file) && $file['image']['error'] == 0) {
            
            $targetDir = __DIR__ . '/../../assets/blogs/';

            // Create the uploads directory if it doesn't exist
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $targetFile = $targetDir . basename($file['image']['name']); // Define the target file path

            // Move the uploaded file to the target directory
            if (move_uploaded_file($file['image']['tmp_name'], $targetFile)) {

                $created_date = date('Y-m-d');
                $blogs_data['created_at'] = $created_date;

                $result = $this->blogs_model->blogInsert($blogs_data, $file['image']['name']);

                if($result['error'] != true) {
                    header('Location: http://localhost/ip_project/views/creators/blogs.php/Blogs added successfully');
                } else {
                    header('Location: http://localhost/ip_project/views/errors/authentication_error.php/' . $result['message'] . '/500');
                }
            } else {
                header('Location: http://localhost/ip_project/views/errors/authentication_error.php/Unable to upload file' . '/500');
            }
        } else {
            header('Location: http://localhost/ip_project/views/errors/authentication_error.php/Invalid file or user data' . '/500');
        }
    }
    
    public function newsInsert() {
        $news_data = $_POST;
        $file = $_FILES;

        if (isset($news_data) && !empty($news_data) && isset($file) && $file['image']['error'] == 0) {
            
            $targetDir = __DIR__ . '/../../assets/news/';

            // Create the uploads directory if it doesn't exist
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $targetFile = $targetDir . basename($file['image']['name']); // Define the target file path

            // Move the uploaded file to the target directory
            if (move_uploaded_file($file['image']['tmp_name'], $targetFile)) {

                $created_date = date('Y-m-d');
                $news_data['created_at'] = $created_date;

                $result = $this->blogs_model->newsInsert($news_data, $file['image']['name']);

                if($result['error'] != true) {
                    header('Location: http://localhost/ip_project/views/creators/news.php/News added successfully');
                } else {
                    header('Location: http://localhost/ip_project/views/errors/authentication_error.php/' . $result['message'] . '/500');
                }
            } else {
                header('Location: http://localhost/ip_project/views/errors/authentication_error.php/Unable to upload file' . '/500');
            }
        } else {
            header('Location: http://localhost/ip_project/views/errors/authentication_error.php/Invalid file or user data' . '/500');
        }
    }

    public function toolsInsert() {
        $tools_data = $_POST;
        $file = $_FILES;

        if (isset($tools_data) && !empty($tools_data) && isset($file) && $file['image']['error'] == 0) {
            
            $targetDir = __DIR__ . '/../../assets/tools/';

            // Create the uploads directory if it doesn't exist
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $targetFile = $targetDir . basename($file['image']['name']); // Define the target file path

            // Move the uploaded file to the target directory
            if (move_uploaded_file($file['image']['tmp_name'], $targetFile)) {

                $created_date = date('Y-m-d');
                $tools_data['created_at'] = $created_date;

                $result = $this->blogs_model->toolsInsert($tools_data, $file['image']['name']);

                if($result['error'] != true) {
                    header('Location: http://localhost/ip_project/views/creators/tools.php/News added successfully');
                } else {
                    header('Location: http://localhost/ip_project/views/errors/authentication_error.php/' . $result['message'] . '/500');
                }
            } else {
                header('Location: http://localhost/ip_project/views/errors/authentication_error.php/Unable to upload file' . '/500');
            }
        } else {
            header('Location: http://localhost/ip_project/views/errors/authentication_error.php/Invalid file or user data' . '/500');
        }
    }

    public function tutorialsInsert() {
        $tutorials_data = $_POST;
        $file = $_FILES;

        if (isset($tutorials_data) && !empty($tutorials_data) && isset($file) && $file['video']['error'] == 0) {
            
            $targetDir = __DIR__ . '/../../assets/tutorials/';

            // Create the uploads directory if it doesn't exist
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $targetFile = $targetDir . basename($file['video']['name']); // Define the target file path

            // Move the uploaded file to the target directory
            if (move_uploaded_file($file['video']['tmp_name'], $targetFile)) {

                $created_date = date('Y-m-d');
                $tutorials_data['created_at'] = $created_date;

                $result = $this->blogs_model->tutorialsInsert($tutorials_data, $file['video']['name']);

                if($result['error'] != true) {
                    header('Location: http://localhost/ip_project/views/creators/tools.php/Tutorials added successfully');
                } else {
                    header('Location: http://localhost/ip_project/views/errors/authentication_error.php/' . $result['message'] . '/500');
                }
            } else {
                header('Location: http://localhost/ip_project/views/errors/authentication_error.php/Unable to upload file' . '/500');
            }
        } else {
            header('Location: http://localhost/ip_project/views/errors/authentication_error.php/Invalid file or user data' . '/500');
        }
    }
}
?>