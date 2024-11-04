<?php

require('./Db.php');
class EngagementModel extends Database{
    public function insert_like_engagement($post_id, $user_id) {
        $conn = $this->Connect();

        // Check if the user has already liked the post
        $checkQuery = $conn->prepare("SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id");
        $checkQuery->bindParam(':post_id', $post_id);
        $checkQuery->bindParam(':user_id', $user_id);
        $checkQuery->execute();

        if ($checkQuery->rowCount() > 0) {
            $stmtDelete = $conn->prepare("DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id");
            $stmtDelete->bindParam(":post_id", $post_id);
            $stmtDelete->bindParam(":user_id", $user_id);
            $stmtDelete->execute();
            return false;
        }

        // Insert the like if it doesn't already exist
        $query = $conn->prepare("INSERT INTO likes(post_id, user_id) VALUES(:post_id, :user_id)");
        $query->bindParam(':post_id', $post_id);
        $query->bindParam(':user_id', $user_id);

        return $query->execute();
    }
    
    public function get_like_engagement() {
        $conn = $this->Connect();
        $query = $conn->prepare("SELECT likes.*, COUNT(*) as likes_count
                                 FROM likes
                                 INNER JOIN posts ON likes.post_id = posts.post_id
                                 GROUP BY likes.post_id");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert_users_pinned_post($post_id, $user_id) {
        $conn = $this->Connect();
    
        // Check if the post is already pinned by the user
        $checkQuery = $conn->prepare("SELECT * FROM users_pinned_posts WHERE post_id = :post_id AND user_id = :user_id");
        $checkQuery->bindParam(':post_id', $post_id);
        $checkQuery->bindParam(':user_id', $user_id);
        $checkQuery->execute();
    
        if ($checkQuery->rowCount() > 0) {
            // Unpin the post by deleting the record
            $stmtDelete = $conn->prepare("DELETE FROM users_pinned_posts WHERE post_id = :post_id AND user_id = :user_id");
            $stmtDelete->bindParam(":post_id", $post_id);
            $stmtDelete->bindParam(":user_id", $user_id);
            $stmtDelete->execute();
            return false; // Indicate that the post was unpinned
        }
    
        // Pin the post by inserting a new record
        $query = $conn->prepare("INSERT INTO users_pinned_posts(post_id, user_id) VALUES(:post_id, :user_id)");
        $query->bindParam(':post_id', $post_id);
        $query->bindParam(':user_id', $user_id);
        
        return $query->execute(); // Returns true if the post was pinned successfully
    }
    
    
}