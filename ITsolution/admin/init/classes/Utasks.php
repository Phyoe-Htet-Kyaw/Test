<?php

    class Utasks extends DB{
        private $con;
        public function __construct(){
            $this->con = $this->connect();
        }

        public function input($param, $file){
            if(isset($param['submit'])){
                $image_name = "USER_" . time() . "_" .$file['photo']['name'];
                $image_tmp_name = $file['photo']['tmp_name'];
                $upload = "uploads/";
                if(move_uploaded_file($image_tmp_name, $upload.$image_name)){
                    $name = $param['uname'];
                    $mail  = $param['email'];
                    $password = $param['pass'];
                    if($name == "" || $mail == "" || $password == ""){
                        echo "Please Enter User Information!";
                    }else{
                        $timestamp = date("Y-m-d H:m:s");
                        $sql = "INSERT INTO tbl_users (name, photos, email, password, created_at) VALUES (:name, :img, :mail, :password, :timestamp)";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bindParam("name", $name, PDO::PARAM_STR);
                        $stmt->bindParam("img", $image_name, PDO::PARAM_LOB);
                        $stmt->bindParam("mail", $mail, PDO::PARAM_STR);
                        $stmt->bindParam("password", $password, PDO::PARAM_STR);
                        $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
                        $stmt->execute();
                        return true;
                    }
                }else{
                    echo "Please reselect image!";
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

        public function update($get, $post, $file){
            if(isset($post['submit'])){
                $name = $post['uname'];
                $image_name = "USER_" . time() . "_" .$file['photo']['name'];
                $image_tmp_name = $file['photo']['tmp_name'];
                $upload = "uploads/";
                $mail = $post['email'];
                $pass = $post['pass'];
                $id = $get['id'];
                if(move_uploaded_file($image_tmp_name, $upload.$image_name)){
                    if($name == "" || $mail == "" || $pass == ""){
                        echo "<p>Please Enter Update User Data!</p>";
                    }else{
                        $sql_new = "SELECT * FROM tbl_users WHERE id=:id";
                        $stmt_new = $this->con->prepare($sql_new);
                        $stmt_new->bindParam("id", $id, PDO::PARAM_INT);
                        $stmt_new->execute();
                        $res_new = $stmt_new->fetch(PDO::FETCH_OBJ);
                        unlink('uploads/' . $res_new->photos);

                        $timestamp = date("Y-m-d H:i:s");
                        $sql = "UPDATE tbl_users SET name=:name, photos=:img, email=:mail, password=:pass, updated_at=:timestamp WHERE id=:id";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bindParam("name", $name, PDO::PARAM_STR);
                        $stmt->bindParam("img", $image_name, PDO::PARAM_LOB);
                        $stmt->bindParam("mail", $mail, PDO::PARAM_STR);
                        $stmt->bindParam("pass", $pass, PDO::PARAM_STR);
                        $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
                        $stmt->bindParam("id", $id, PDO::PARAM_INT);
                        $stmt->execute();
                        return true;
                    }
                }else{
                    if($name == "" || $mail == "" || $pass == ""){
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