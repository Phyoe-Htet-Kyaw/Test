<?php

    class Btasks extends DB{
        private $con;
        public function __construct(){
            $this->con = $this->connect();
        }

        public function show(){
            $sql = "SELECT tbl_blogs.id, tbl_blogs.title, tbl_blogs.description, tbl_users.name AS user, tbl_categories.name AS category, tbl_tags.name AS tag FROM tbl_blogs INNER JOIN tbl_users ON tbl_blogs.user_id = tbl_users.id INNER JOIN tbl_categories ON tbl_blogs.category_id = tbl_categories.id INNER JOIN tbl_tags ON tbl_blogs.tag_id = tbl_tags.id WHERE tbl_blogs.deleted_at IS NULL ORDER BY tbl_blogs.created_at DESC;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }

        public function input($param){
            if(isset($param['submit'])){
                $blog_title = $param['btitle'];
                $description  = $param['description'];
                $user= $param['user'];
                $category = $param['category'];
                $tag = $param['tag'];
                if($blog_title == "" || $description == "" || $user == "" || $category == "" || $tag == ""){
                    echo "Please Enter BLog Information!";
                }else{
                    $timestamp = date("Y-m-d H:m:s");
                    $sql = "INSERT INTO tbl_blogs (title, description, user_id, category_id, tag_id, created_at) VALUES (:btitle, :desc, :user, :categ, :tag, :timestamp)";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam("btitle", $blog_title, PDO::PARAM_STR);
                    $stmt->bindParam("desc", $description, PDO::PARAM_STR);
                    $stmt->bindParam("user", $user, PDO::PARAM_STR);
                    $stmt->bindParam("categ", $category, PDO::PARAM_STR);
                    $stmt->bindParam("tag", $tag, PDO::PARAM_STR);
                    $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
                    $stmt->execute();
                    return true;
                }
            }
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
            $sql = "SELECT * FROM tbl_blogs WHERE id=:id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            return $res;
        }

        public function update($get, $post){
            if(isset($post['submit'])){
                $blog_title = $post['btitle'];
                $description  = $post['description'];
                $user= $post['user'];
                $category = $post['category'];
                $tag = $post['tag'];
                $id= $get['id'];
    
                if($blog_title == "" || $description == "" || $user == "" || $category == "" || $tag == ""){
                    echo "Please Enter BLog Information!";
                }else{
                    $timestamp = date("Y-m-d H:m:s");
                    $sql = "UPDATE tbl_blogs SET title=:btitle, description=:desc, user_id=:user, category_id=:categ, tag_id=:tag, updated_at=:timestamp WHERE id=:id";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam("btitle", $blog_title, PDO::PARAM_STR);
                    $stmt->bindParam("desc", $description, PDO::PARAM_STR);
                    $stmt->bindParam("user", $user, PDO::PARAM_STR);
                    $stmt->bindParam("categ", $category, PDO::PARAM_STR);
                    $stmt->bindParam("tag", $tag, PDO::PARAM_STR);
                    $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
                    $stmt->bindParam("id", $id, PDO::PARAM_INT);
                    $stmt->execute();
                    return true;
                }
            }
        }

        public function delete($id){
            $timestamp = date("Y-m-d H:i:s");
            $sql = "UPDATE tbl_blogs SET deleted_at=:timestamp WHERE id=:id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
    }
?>