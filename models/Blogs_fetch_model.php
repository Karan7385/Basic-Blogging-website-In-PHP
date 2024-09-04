<?php

require_once '../../../config/database.php';
require_once '../../../assets/helpers/helpers.php';

class Blogs_model {
    private $mysqli;

    public function __construct() {
        $connect = new Database();
        $this->mysqli = $connect->con;
    }

    public function fetchAll($table) {
        $stmt = $this->mysqli->prepare("SELECT * FROM $table");
        if ($stmt) {
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $data;
        } else {
            return createResponse(true, $this->mysqli->error, []);
        }
    }

    public function fetchRecent($table, $limit = 6) {
        $stmt = $this->mysqli->prepare("
            SELECT * 
            FROM $table 
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL 2 DAY) 
            ORDER BY created_at DESC 
            LIMIT ?
        ");
        
        if ($stmt) {
            $stmt->bind_param("i", $limit);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            
            if (count($data) < $limit) {
                $remainingLimit = $limit - count($data);
                $stmt = $this->mysqli->prepare("
                    SELECT * 
                    FROM $table 
                    WHERE created_at < DATE_SUB(NOW(), INTERVAL 2 DAY) 
                    ORDER BY created_at DESC 
                    LIMIT ?
                ");
                
                if ($stmt) {
                    $stmt->bind_param("i", $remainingLimit);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $additionalData = $result->fetch_all(MYSQLI_ASSOC);
                    $data = array_merge($data, $additionalData);
                }
            }
            
            $stmt->close();
            return $data;
        } else {
            return createResponse(true, $this->mysqli->error, []);
        }
    }   
    
}

?>