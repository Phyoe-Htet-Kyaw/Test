<?php

    class Ttasks extends DB{
        private $con;
        public function __construct(){
            $this->con = $this->connect();
        }

        public function input($param){
            if(isset($param['submit'])){
                $tag = $param['tag'];
                if($tag == ""){
                    echo "Please Enter Category!";
                }else{
                    $timestamp = date("Y-m-d H:i:s");
                    $sql = "INSERT INTO tbl_tags (name, created_at) VALUES (:tag, :timestamp)";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam("tag", $tag, PDO::PARAM_STR);
                    $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
                    $stmt->execute();
                    return true;
                }
            }
        }

        public function show(){
            $sql = "SELECT * FROM tbl_tags WHERE deleted_at IS NULL ORDER BY created_at DESC";
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
            $sql = "SELECT * FROM tbl_tags WHERE id=:id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            return $res;
        }

        public function update($get, $post){
            if(isset($post['submit'])){
                $tag = $post['tag'];
                $id = $get['id'];
    
                if($tag == ""){
                    echo "<p>Please Enter Update Tag!</p>";
                }else{
                    $timestamp = date("Y-m-d H:i:s");
                    $sql = "UPDATE tbl_tags SET name=:tag, updated_at=:timestamp WHERE id=:id";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam("tag", $tag, PDO::PARAM_STR);
                    $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
                    $stmt->bindParam("id", $id, PDO::PARAM_INT);
                    $stmt->execute();
                    return true;
                }
            }
        }

        public function delete($id){
            $timestamp = date("Y-m-d H:i:s");;
            $sql = "UPDATE tbl_tags SET deleted_at=:timestamp WHERE id=:id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }

    }
?>