<?php

require('./Db.php');
class EngagementModel extends Database{
    public function insert_like_engagement($post_id, $user_id){
        $conn = $this->Connect();
        $query= $conn->prepare("INSERT INTO likes(post_id, user_id) VALUES(:post_id, :user_id)");
        $query->bindParam(':post_id', $post_id);
        $query->bindParam(':user_id', $user_id);
        $query->execute();
        return $query->execute();
    }
    
    public function get_like_engagement($post_id){
        $conn = $this->Connect();
        $query = $conn->prepare("SELECT * FROM likes WHERE post_id = :post_id");
        $query->bindParam(':post_id', $post_id);
        $query->execute();
        return $query->fetchAll();
        
    }
}