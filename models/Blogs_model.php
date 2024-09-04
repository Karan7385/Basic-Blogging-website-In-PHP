<?php

require_once '../../config/database.php';
require_once '../../assets/helpers/helpers.php';

class Blogs_model {
    private $mysqli;

    public function __construct() {
        $connect = new Database();
        $this -> mysqli = $connect->con;
    }
    
    public function blogInsert($blogs_data, $file) {
        $stmt = $this -> mysqli -> prepare("INSERT INTO blogs (title, shortDescription, images, descriptions, created_at) VALUES (?, ?, ?, ?, ?)");
        
        if ($stmt) {
            $stmt -> bind_param("sssss", $blogs_data['title'], $blogs_data['shortDescription'], $file, $blogs_data['description'], $blogs_data['created_at']);
            
            if ($stmt -> execute()) {
                $res = createResponse(false, "Blogs added successfully", []);
                $stmt->close();
                return $res;
            } else {
                $res = createResponse(true, $stmt -> error, []);
                $stmt->close();
                return $res;
            }

            $stmt -> close();
        } else {
            $res = createResponse(true, $this -> mysqli->error, []);
            $stmt->close();
            return $res;
        }

        $this -> mysqli -> close();
    }

    public function newsInsert($news_data, $file) {
        $stmt = $this -> mysqli -> prepare("INSERT INTO news (headline, shortDescription, image, newss, created_at) VALUES (?, ?, ?, ?, ?)");
        
        if ($stmt) {
            $stmt -> bind_param("sssss", $news_data['headline'], $news_data['shortDescription'], $file, $news_data['news'], $news_data['created_at']);
            
            if ($stmt -> execute()) {
                $res = createResponse(false, "Blogs added successfully", []);
                $stmt->close();
                return $res;
            } else {
                $res = createResponse(true, $stmt -> error, []);
                $stmt->close();
                return $res;
            }

            $stmt -> close();
        } else {
            $res = createResponse(true, $this -> mysqli->error, []);
            $stmt->close();
            return $res;
        }

        $this -> mysqli -> close();
    }

    public function toolsInsert($tools_data, $file) {
        $stmt = $this -> mysqli -> prepare("INSERT INTO tools (toolName, shortDescription, image, descriptions, created_at) VALUES (?, ?, ?, ?, ?)");
        
        if ($stmt) {
            $stmt -> bind_param("sssss", $tools_data['toolName'], $tools_data['shortDescription'], $file, $tools_data['description'], $tools_data['created_at']);
            
            if ($stmt -> execute()) {
                $res = createResponse(false, "Trending AI Tools added successfully", []);
                $stmt->close();
                return $res;
            } else {
                $res = createResponse(true, $stmt -> error, []);
                $stmt->close();
                return $res;
            }

            $stmt -> close();
        } else {
            $res = createResponse(true, $this -> mysqli->error, []);
            $stmt->close();
            return $res;
        }

        $this -> mysqli -> close();
    }
    
    public function tutorialsInsert($tutorials_data, $file) {
        $stmt = $this -> mysqli -> prepare("INSERT INTO tutorials (title, shortDescription, video, created_at) VALUES (?, ?, ?, ?)");
        
        if ($stmt) {
            $stmt -> bind_param("ssss", $tutorials_data['title'], $tutorials_data['shortDescription'], $file, $tutorials_data['created_at']);
            
            if ($stmt -> execute()) {
                $res = createResponse(false, "Tutorials added successfully", []);
                $stmt->close();
                return $res;
            } else {
                $res = createResponse(true, $stmt -> error, []);
                $stmt->close();
                return $res;
            }

            $stmt -> close();
        } else {
            $res = createResponse(true, $this -> mysqli->error, []);
            $stmt->close();
            return $res;
        }

        $this -> mysqli -> close();
    }
}

?>