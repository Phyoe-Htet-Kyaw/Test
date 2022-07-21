<?php

    class Projects extends DB{
        private $con;
        public function __construct(){
            $this->con = $this->connect();
        }

        public function show(){
            $sql = "SELECT tbl_projects.id, tbl_projects.title, tbl_projects.description, tbl_projects.images, tbl_users.name AS user, tbl_project_categories.name AS category, tbl_projects.created_at FROM tbl_projects INNER JOIN tbl_users ON tbl_projects.user_id = tbl_users.id INNER JOIN tbl_project_categories ON tbl_projects.category_id = tbl_project_categories.id WHERE tbl_projects.deleted_at IS NULL ORDER BY tbl_projects.created_at DESC;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }

        public function input($param, $file){
            if(isset($param['submit'])){
                $image_name = "PROJECT_" . time() . "_" .$file['image']['name'];
                $image_tmp_name = $file['image']['tmp_name'];
                $upload = "uploads/";
                if(move_uploaded_file($image_tmp_name, $upload.$image_name)){
                    $title = $param['ptitle'];
                    $description  = $param['description'];
                    $user= $param['user'];
                    $category = $param['category'];
                    if($title == "" || $description == "" || $user == "" || $category == ""){
                        echo "Please Enter Project Information!";
                    }else{
                        $timestamp = date("Y-m-d H:m:s");
                        $sql = "INSERT INTO tbl_projects (title, description, images, user_id, category_id, created_at) VALUES (:title, :desc, :img, :user, :categ, :timestamp)";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bindParam("title", $title, PDO::PARAM_STR);
                        $stmt->bindParam("desc", $description, PDO::PARAM_STR);
                        $stmt->bindParam("img", $image_name, PDO::PARAM_LOB);
                        $stmt->bindParam("user", $user, PDO::PARAM_STR);
                        $stmt->bindParam("categ", $category, PDO::PARAM_STR);
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
            $sql = "SELECT * FROM tbl_projects WHERE id=:id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            return $res;
        }

        public function update($get, $post, $file){
            if(isset($post['submit'])){
                $title = $post['ptitle'];
                $description  = $post['description'];
                $image_name = "BLOG_" . time() . "_" . $file['image']['name'];
                $image_tmp_name = $file['image']['tmp_name'];
                $upload = "uploads/";
                $user= $post['user'];
                $category = $post['category'];
                $id= $get['id'];

                if(move_uploaded_file($image_tmp_name, $upload.$image_name)){  
                    if($title == "" || $description == "" || $user == "" || $category == ""){
                        echo "Please Enter Project Information!";
                    }else{
                        $sql_new = "SELECT * FROM tbl_projects WHERE id=:id";
                        $stmt_new = $this->con->prepare($sql_new);
                        $stmt_new->bindParam("id", $id, PDO::PARAM_INT);
                        $stmt_new->execute();
                        $res_new = $stmt_new->fetch(PDO::FETCH_OBJ);
                        unlink('uploads/' . $res_new->images);
                        
                        $timestamp = date("Y-m-d H:m:s");
                        $sql = "UPDATE tbl_projects SET title=:ptitle, description=:desc, images=:img, user_id=:user, category_id=:categ, updated_at=:timestamp WHERE id=:id";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bindParam("ptitle", $title, PDO::PARAM_STR);
                        $stmt->bindParam("desc", $description, PDO::PARAM_STR);
                        $stmt->bindParam("img", $image_name, PDO::PARAM_LOB);
                        $stmt->bindParam("user", $user, PDO::PARAM_STR);
                        $stmt->bindParam("categ", $category, PDO::PARAM_STR);
                        $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
                        $stmt->bindParam("id", $id, PDO::PARAM_INT);
                        $stmt->execute();
                        return true;
                    }
                }else{                   
                    if($title == "" || $description == "" || $user == "" || $category == ""){
                        echo "Please Enter Project Information!";
                    }else{
                        $timestamp = date("Y-m-d H:m:s");
                        $sql = "UPDATE tbl_projects SET title=:ptitle, description=:desc, user_id=:user, category_id=:categ, updated_at=:timestamp WHERE id=:id";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bindParam("ptitle", $title, PDO::PARAM_STR);
                        $stmt->bindParam("desc", $description, PDO::PARAM_STR);
                        $stmt->bindParam("user", $user, PDO::PARAM_STR);
                        $stmt->bindParam("categ", $category, PDO::PARAM_STR);
                        $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
                        $stmt->bindParam("id", $id, PDO::PARAM_INT);
                        $stmt->execute();
                        return true;
                    }
                }

            }
        }

        public function delete($id){
            $sql_new = "SELECT * FROM tbl_projects WHERE id=:id";
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
            $sql = "UPDATE tbl_projects SET deleted_at=:timestamp WHERE id=:id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
    }
?>