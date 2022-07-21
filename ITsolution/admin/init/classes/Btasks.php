<?php

    class Btasks extends DB{
        private $con;
        public function __construct(){
            $this->con = $this->connect();
        }

        public function show(){
            $sql = "SELECT tbl_blogs.id, tbl_blogs.title, tbl_blogs.description, tbl_blogs.images, tbl_users.name AS user, tbl_categories.name AS category, tbl_tags.name AS tag, tbl_blogs.created_at FROM tbl_blogs INNER JOIN tbl_users ON tbl_blogs.user_id = tbl_users.id INNER JOIN tbl_categories ON tbl_blogs.category_id = tbl_categories.id INNER JOIN tbl_tags ON tbl_blogs.tag_id = tbl_tags.id WHERE tbl_blogs.deleted_at IS NULL ORDER BY tbl_blogs.created_at DESC;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }

        public function detail($id){
            $sql = "SELECT tbl_blogs.id, tbl_blogs.title, tbl_blogs.description, tbl_blogs.images, tbl_users.name AS user, tbl_categories.name AS category, tbl_tags.name AS tag, tbl_blogs.created_at FROM tbl_blogs INNER JOIN tbl_users ON tbl_blogs.user_id = tbl_users.id INNER JOIN tbl_categories ON tbl_blogs.category_id = tbl_categories.id INNER JOIN tbl_tags ON tbl_blogs.tag_id = tbl_tags.id WHERE tbl_blogs.id=:id;";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            return $res;
        }

        public function tagCount($id){
            $sql = "SELECT COUNT(*) AS count FROM tbl_blogs WHERE tag_id=:id AND deleted_at IS NULL ORDER BY created_at DESC;";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            return $res;
        }

        public function random1(){
            $sql = "SELECT tbl_blogs.id, tbl_blogs.title, tbl_blogs.description, tbl_blogs.images, tbl_users.name AS user, tbl_categories.name AS category, tbl_tags.name AS tag, tbl_blogs.created_at FROM tbl_blogs INNER JOIN tbl_users ON tbl_blogs.user_id = tbl_users.id INNER JOIN tbl_categories ON tbl_blogs.category_id = tbl_categories.id INNER JOIN tbl_tags ON tbl_blogs.tag_id = tbl_tags.id WHERE tbl_blogs.deleted_at IS NULL ORDER BY RAND() LIMIT 3;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }

        public function random2(){
            $sql = "SELECT tbl_blogs.id, tbl_blogs.title, tbl_blogs.description, tbl_blogs.images, tbl_users.name AS user, tbl_categories.name AS category, tbl_tags.name AS tag, tbl_blogs.created_at FROM tbl_blogs INNER JOIN tbl_users ON tbl_blogs.user_id = tbl_users.id INNER JOIN tbl_categories ON tbl_blogs.category_id = tbl_categories.id INNER JOIN tbl_tags ON tbl_blogs.tag_id = tbl_tags.id WHERE tbl_blogs.deleted_at IS NULL ORDER BY RAND() LIMIT 5;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }

        public function recentBlog(){
            $sql = "SELECT tbl_blogs.id, tbl_blogs.title, tbl_blogs.description, tbl_blogs.images, tbl_users.name AS user, tbl_categories.name AS category, tbl_tags.name AS tag, tbl_blogs.created_at FROM tbl_blogs INNER JOIN tbl_users ON tbl_blogs.user_id = tbl_users.id INNER JOIN tbl_categories ON tbl_blogs.category_id = tbl_categories.id INNER JOIN tbl_tags ON tbl_blogs.tag_id = tbl_tags.id WHERE tbl_blogs.deleted_at IS NULL ORDER BY tbl_blogs.created_at DESC LIMIT 3;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }

        public function input($param, $file){
            if(isset($param['submit'])){
                $image_name = "BLOG_" . time() . "_" .$file['image']['name'];
                $image_tmp_name = $file['image']['tmp_name'];
                $upload = "uploads/";
                if(move_uploaded_file($image_tmp_name, $upload.$image_name)){
                    $blog_title = $param['btitle'];
                    $description  = $param['description'];
                    $user= $param['user'];
                    $category = $param['category'];
                    $tag = $param['tag'];
                    if($blog_title == "" || $description == "" || $user == "" || $category == "" || $tag == ""){
                        echo "Please Enter BLog Information!";
                    }else{
                        $timestamp = date("Y-m-d H:m:s");
                        $sql = "INSERT INTO tbl_blogs (title, description, images, user_id, category_id, tag_id, created_at) VALUES (:btitle, :desc, :img, :user, :categ, :tag, :timestamp)";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bindParam("btitle", $blog_title, PDO::PARAM_STR);
                        $stmt->bindParam("desc", $description, PDO::PARAM_STR);
                        $stmt->bindParam("img", $image_name, PDO::PARAM_LOB);
                        $stmt->bindParam("user", $user, PDO::PARAM_STR);
                        $stmt->bindParam("categ", $category, PDO::PARAM_STR);
                        $stmt->bindParam("tag", $tag, PDO::PARAM_STR);
                        $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
                        $stmt->execute();
                        return true;
                    }
                }else{
                    echo "Please reselect image!";
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

        public function update($get, $post, $file){
            if(isset($post['submit'])){
                $blog_title = $post['btitle'];
                $description  = $post['description'];
                $image_name = "BLOG_" . time() . "_" . $file['image']['name'];
                $image_tmp_name = $file['image']['tmp_name'];
                $upload = "uploads/";
                $user= $post['user'];
                $category = $post['category'];
                $tag = $post['tag'];
                $id= $get['id'];

                if(move_uploaded_file($image_tmp_name, $upload.$image_name)){  
                    if($blog_title == "" || $description == "" || $user == "" || $category == "" || $tag == ""){
                        echo "Please Enter BLog Information!";
                    }else{
                        $sql_new = "SELECT * FROM tbl_blogs WHERE id=:id";
                        $stmt_new = $this->con->prepare($sql_new);
                        $stmt_new->bindParam("id", $id, PDO::PARAM_INT);
                        $stmt_new->execute();
                        $res_new = $stmt_new->fetch(PDO::FETCH_OBJ);
                        unlink('uploads/' . $res_new->images);
                        
                        $timestamp = date("Y-m-d H:m:s");
                        $sql = "UPDATE tbl_blogs SET title=:btitle, description=:desc, images=:img, user_id=:user, category_id=:categ, tag_id=:tag, updated_at=:timestamp WHERE id=:id";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bindParam("btitle", $blog_title, PDO::PARAM_STR);
                        $stmt->bindParam("desc", $description, PDO::PARAM_STR);
                        $stmt->bindParam("img", $image_name, PDO::PARAM_LOB);
                        $stmt->bindParam("user", $user, PDO::PARAM_STR);
                        $stmt->bindParam("categ", $category, PDO::PARAM_STR);
                        $stmt->bindParam("tag", $tag, PDO::PARAM_STR);
                        $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
                        $stmt->bindParam("id", $id, PDO::PARAM_INT);
                        $stmt->execute();
                        return true;
                    }
                }else{                   
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
        }

        public function delete($id){
            $sql_new = "SELECT * FROM tbl_blogs WHERE id=:id";
            $stmt_new = $this->con->prepare($sql_new);
            $stmt_new->bindParam("id", $id, PDO::PARAM_INT);
            $stmt_new->execute();
            $res_new = $stmt_new->fetch(PDO::FETCH_OBJ);
            
            if(unlink('uploads/' . $res_new->images)){
                echo "success";
            }else{
                echo "fail";
            }

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