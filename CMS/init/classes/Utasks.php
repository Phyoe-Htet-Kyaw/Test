<?php

    class Utasks extends DB{
        private $con;
        public function __construct(){
            $this->con = $this->connect();
        }

        public function input($param){
            if(isset($param['submit'])){
                $name = $param['uname'];
                $mail  = $param['email'];
                $password = $param['pass'];
                if($name == "" || $mail == "" || $password == ""){
                    echo "Please Enter User Information!";
                }else{
                    $timestamp = date("Y-m-d H:m:s");
                    $sql = "INSERT INTO tbl_users (name, email, password, created_at) VALUES (:name, :mail, :password, :timestamp)";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam("name", $name, PDO::PARAM_STR);
                    $stmt->bindParam("mail", $mail, PDO::PARAM_STR);
                    $stmt->bindParam("password", $password, PDO::PARAM_STR);
                    $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
                    $stmt->execute();
                    return true;
                }
            }
        }

        public function show(){
            $sql = "SELECT * FROM tbl_users WHERE deleted_at IS NULL ORDER BY created_at DESC";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }

        public function middleware($param){
            if(isset($param['id'])){
                if($param['id'] != ""){
                    $id = intval($param['id']);
                    if($id > 0){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function edit($id){
            $sql = "SELECT * FROM tbl_users WHERE id=:id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            return $res;
        }

        public function update($get, $post){
            if(isset($post['submit'])){
                $name = $post['uname'];
                $mail = $post['email'];
                $pass = $post['pass'];
                $id = $get['id'];
    
                if($uname && $email && $pass == ""){
                    echo "<p>Please Enter Update User Data!</p>";
                }else{
                    $timestamp = date("Y-m-d H:i:s");
                    $sql = "UPDATE tbl_users SET name=:name, email=:mail, password=:pass, updated_at=:timestamp WHERE id=:id";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam("name", $name, PDO::PARAM_STR);
                    $stmt->bindParam("mail", $mail, PDO::PARAM_STR);
                    $stmt->bindParam("pass", $pass, PDO::PARAM_STR);
                    $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
                    $stmt->bindParam("id", $id, PDO::PARAM_INT);
                    $stmt->execute();
                    return true;
                }
            }
        }

        public function delete($id){
            $timestamp = date("Y-m-d H:i:s");
            $sql = "UPDATE tbl_users SET deleted_at=:timestamp WHERE id=:id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
    }

?>