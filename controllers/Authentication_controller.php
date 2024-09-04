<?php
require_once '../models/Authentication_model.php';
require_once '../assets/helpers/helpers.php';

class Authentication {
    private $authentication_model;
    
    public function __construct() {
        $this->authentication_model = new Authentication_model();
    }

    public function register() {
        require_once '../config/config.php';

        $user_data = $_POST;
        $file = $_FILES['photo'];

        if (isset($user_data) && !empty($user_data) && isset($file) && $file['error'] == 0) {
            
            $targetDir = __DIR__ . '/../assets/uploads/'; // Correct the target directory to a filesystem path

            // Create the uploads directory if it doesn't exist
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $targetFile = $targetDir . basename($file['name']); // Define the target file path

            // Move the uploaded file to the target directory
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {

                $created_date = date('Y-m-d H:i:s');
                $user_data['created_at'] = $created_date;

                $user_data['password'] = password_hash($user_data['password'], PASSWORD_DEFAULT);

                $result = $this->authentication_model->register($user_data, $file);

                if($result['error'] != true) {
                    session_start();
                    $_SESSION['username'] = $user_data['name'];
                    $_SESSION['email'] = $user_data['email'];
                    $_SESSION['photo'] = $file['name'];
                    $_SESSION['mobile'] = $user_data['mobile'];
                    $_SESSION['contentType'] = '';
                    $_SESSION['created_at'] = $user_data['created_at'];

                    header('Location: ' . $base_url . '/views/pages/home/home.php');
                } else {
                    header('Location: ' . $base_url . '/../views/errors/authentication_error.php/' . $result['message'] . '/500');
                }
            } else {
                header('Location: ' . $base_url . '/../views/errors/authentication_error.php/Unable to upload file' . '/500');
            }
        } else {
            header('Location: ' . $base_url . '/../views/errors/authentication_error.php/Invalid file or user data' . '/500');
        }
    }

    public function login() {
        $user_data = $_POST;
        if($user_data['contentType'] != '' && $user_data['contentType'] != null) {
            $result = $this->authentication_model->creatorLogin($user_data);
            if($result['error'] != true) {
                session_start();
                $_SESSION['username'] = $result['data']['name'];
                $_SESSION['email'] = $result['data']['email'];
                $_SESSION['photo'] = $result['data']['photo'];
                $_SESSION['contentType'] = $result['data']['contentType'];
                $_SESSION['mobile'] = $result['data']['mobile'];
                header('Location: ' . $base_url . '/ip_project/views/creators/blogs.php');
            } else {
                header('Location: ' . $base_url . '../?msg=' . $result['message'] . '&status=1');
            }
        } else {
            $result = $this->authentication_model->login($user_data);
            if($result['error'] != true) {
                session_start();
                $_SESSION['username'] = $result['data']['name'];
                $_SESSION['email'] = $result['data']['email'];
                $_SESSION['photo'] = $result['data']['photo'];
                $_SESSION['mobile'] = $result['data']['mobile'];
                $_SESSION['contentType'] = '';
                header('Location: ' . $base_url . '/ip_project/views/pages/home/home.php');
            } else {
                header('Location: ' . $base_url . '../?msg=' . $result['message'] . '&status=1');
            }
        }
    }

    public function signOut() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }

    public function forgot_password() {
        $user_data = $_POST;
        if($user_data['contentType'] != '' && $user_data['contentType'] != null) {
            $result = $this->authentication_model->creator_forgot_password($user_data['email'], password_hash($user_data['password'], PASSWORD_DEFAULT));
            if($result['error'] != true) {
                header('Location: ' . $base_url . '../?msg=' . $result['message'] . '&status=0');
            } else {
                header('Location: ' . $base_url . '/../views/errors/authentication_error.php/' . $result['message'] . '/500');
            }
        } else {
            $result = $this->authentication_model->forgot_password($user_data['email'], password_hash($user_data['password'], PASSWORD_DEFAULT));
            if($result['error'] != true) {
                header('Location: ' . $base_url . '../?msg=' . $result['message'] . '&status=0');
            } else {
                header('Location: ' . $base_url . '/../views/errors/authentication_error.php/' . $result['message'] . '/500');
            }
        }   
    }

    public function creator() {
        require_once '../config/config.php';

        $user_data = $_POST;
        $file = $_FILES['photo'];

        if (isset($user_data) && !empty($user_data) && isset($file) && $file['error'] == 0) {
            
            $targetDir = __DIR__ . '/../assets/uploads/'; // Correct the target directory to a filesystem path

            // Create the uploads directory if it doesn't exist
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $targetFile = $targetDir . basename($file['name']); // Define the target file path

            // Move the uploaded file to the target directory
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {

                $created_date = date('Y-m-d H:i:s');
                $user_data['created_at'] = $created_date;

                $user_data['password'] = password_hash($user_data['password'], PASSWORD_DEFAULT);

                $result = $this->authentication_model->creator($user_data, $file);

                if($result['error'] != true) {
                    session_start();
                    $_SESSION['username'] = $user_data['name'];
                    $_SESSION['email'] = $user_data['email'];
                    $_SESSION['photo'] = $file['name'];
                    $_SESSION['mobile'] = $user_data['mobile'];
                    $_SESSION['contentType'] = $user_data['contentType'];
                    $_SESSION['created_at'] = $user_data['created_at'];

                    header('Location: ' . $base_url . '/views/creators/blogs.php');
                } else {
                    header('Location: ' . $base_url . '/../views/errors/authentication_error.php/' . $result['message'] . '/500');
                }
            } else {
                header('Location: ' . $base_url . '/../views/errors/authentication_error.php/Unable to upload file' . '/500');
            }
        } else {
            header('Location: ' . $base_url . '/../views/errors/authentication_error.php/Invalid file or user data' . '/500');
        }
    }
}
?>