<?php

require_once '../config/database.php';
require_once '../assets/helpers/helpers.php';

class Authentication_model {
    private $mysqli;

    public function __construct() {
        $connect = new Database();
        $this -> mysqli = $connect->con;
    }
    
    public function register($user_data, $file) {
        $stmt = $this -> mysqli -> prepare("INSERT INTO users (name, email, password, mobile, photo, created_at) VALUES (?, ?, ?, ?, ?, ?)");
        
        if ($stmt) {
            $stmt -> bind_param("ssssss", $user_data['name'], $user_data['email'], $user_data['password'], $user_data['mobile'], $file['name'], $user_data['created_at']);
            
            if ($stmt -> execute()) {
                $res = createResponse(false, "User registered successfully", []);
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

    public function login($user_data) {
        $stmt = $this -> mysqli -> prepare("SELECT name, email, password, mobile, photo FROM users WHERE email = ?");

        if($stmt) {
            $stmt -> bind_param("s", $user_data['email']);

            if ($stmt -> execute()) {
                $stmt -> bind_result($name, $email, $hashed_password, $mobile, $photo);

                if($stmt -> fetch()) {
                    if (password_verify($user_data['password'], $hashed_password)) {
                        $data = [
                            'name' => $name,
                            'email' => $email,
                            'mobile' => $mobile,
                            'photo' => $photo
                        ];
                        $res = createResponse(false, "Login successful", $data);
                        $stmt->close();
                        return $res;
                    } else {
                        $res = createResponse(true, "Invalid password", []);
                        $stmt->close();
                        return $res;
                    }
                } else {
                    $res = createResponse(true, "Email address doesn't exist", []);
                    $stmt->close();
                    return $res;
                }
            } else {
                $res = createResponse(true, $stmt -> error, []);
                $stmt->close();
                return $res;
            }

            $stmt -> close();
        } else {
            $res = createResponse(true, $this -> mysqli -> error, []);
            $stmt->close();
            return $res;
        }
    }

    public function forgot_password($email, $password) {
        $stmt = $this->mysqli->prepare("UPDATE users SET password = ? WHERE email = ?");

        if ($stmt) {
            $stmt->bind_param("ss", $password, $email);

            if ($stmt->execute()) {
                $res = createResponse(false, "Password updated successfully", []);
                $stmt->close();
                return $res;
            } else {
                $res = createResponse(true, $stmt->error, []);
                $stmt->close();
                return $res;
            }
        } else {
            $res = createResponse(true, $this->mysqli->error, []);
            return $res;
        }
    }

    public function creator_forgot_password($email, $password) {
        $stmt = $this->mysqli->prepare("UPDATE creators SET password = ? WHERE email = ?");

        if ($stmt) {
            $stmt->bind_param("ss", $password, $email);

            if ($stmt->execute()) {
                $res = createResponse(false, "Password updated successfully", []);
                $stmt->close();
                return $res;
            } else {
                $res = createResponse(true, $stmt->error, []);
                $stmt->close();
                return $res;
            }
        } else {
            $res = createResponse(true, $this->mysqli->error, []);
            return $res;
        }
    }

    public function creator($user_data, $file) {
        $stmt = $this -> mysqli -> prepare("INSERT INTO creators (name, email, password, mobile, contentType, photo, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt) {
            $stmt -> bind_param("sssssss", $user_data['name'], $user_data['email'], $user_data['password'], $user_data['mobile'], $user_data['contentType'],$file['name'], $user_data['created_at']);
            
            if ($stmt -> execute()) {
                $res = createResponse(false, "Creators registered successfully", []);
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

    public function creatorLogin($user_data) {
        $stmt = $this -> mysqli -> prepare("SELECT name, email, password, mobile, contentType, photo FROM creators WHERE email = ?");

        if($stmt) {
            $stmt -> bind_param("s", $user_data['email']);

            if ($stmt -> execute()) {
                $stmt -> bind_result($name, $email, $hashed_password, $mobile, $contentType, $photo);

                if($stmt -> fetch()) {
                    if (password_verify($user_data['password'], $hashed_password)) {
                        $data = [
                            'name' => $name,
                            'email' => $email,
                            'mobile' => $mobile,
                            'contentType' => $contentType,
                            'photo' => $photo
                        ];
                        $res = createResponse(false, "Login successful", $data);
                        $stmt->close();
                        return $res;
                    } else {
                        $res = createResponse(true, "Invalid password", []);
                        $stmt->close();
                        return $res;
                    }
                } else {
                    $res = createResponse(true, "Email address doesn't exist", []);
                    $stmt->close();
                    return $res;
                }
            } else {
                $res = createResponse(true, $stmt -> error, []);
                $stmt->close();
                return $res;
            }

            $stmt -> close();
        } else {
            $res = createResponse(true, $this -> mysqli -> error, []);
            $stmt->close();
            return $res;
        }
    }
}

?>