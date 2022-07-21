<?php

    class Feedback extends DB{
        private $con;
        public function __construct(){
            $this->con = $this->connect();
        }

        public function rate($get, $post){
            if(isset($post['submit'])){
                $id = $get['id'];
                $rating = $post['rating'];
                $feedback = $post['feedback'];
                if($rating == "" || $feedback = ""){
                    echo "Rate and Give feedback!";
                }else{
                    $timestamp = date("Y-m-d H:i:s");
                    $sql = "INSERT INTO tbl_feedbacks (user_id, rating, feedback, created_at) VALUES (:id, :rating, :feedback, :timestamp)";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam("id", $id, PDO::PARAM_INT);
                    $stmt->bindParam("rating", $rating, PDO::PARAM_INT);
                    $stmt->bindParam("feedback", $feedback, PDO::PARAM_STR);
                    $stmt->bindParam("timestamp", $timestamp, PDO::PARAM_STR);
                    $stmt->execute();
                    return true;
                }
            }
        }
    }

?>