<?php
/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 * @author Sohrab Hossan
 */
class DbHandler {
    private $conn;
    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }
 
    /* ------------- `users` table method ------------------ */
 
    /**
     * Creating new user
     * @param String $name User full name
     * @param String $email User login email id
     * @param String $password User login password
     */
    public function createUser($user_type, $email, $first_name, $last_name, $password, $fb_id) {
        require_once 'PassHash.php';
        $response = array();
        $user_password = $password;
		if($email != ''){
			$user_password = PassHash::hash($password);
		}
		$stmt = $this->conn->prepare("INSERT INTO users(user_type, email, first_name, last_name, user_password, fb_id) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $user_type, $email, $first_name, $last_name, $password, $fb_id);
		$result = $stmt->execute();
		$stmt->close();
		if ($result) {
			return USER_CREATED_SUCCESSFULLY;
		} else {
			return USER_CREATE_FAILED;
		}
        return $response;
    }
	
	/**
     * Creating new user
     * @param String $name User full name
     * @param String $email User login email id
     * @param String $password User login password
     */
    public function createAdmin($user_type, $email, $first_name, $last_name, $password, $fb_id) {
        require_once 'PassHash.php';
        $response = array();
        // First check if user already existed in db
        if (!$this->isUserExists($email)) {
            $password_hash = PassHash::hash($password); 
            // insert query
            $stmt = $this->conn->prepare("INSERT INTO users(user_type, email, first_name, last_name, user_password, fb_id) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $user_type, $email, $first_name, $last_name, $password_hash, $fb_id);
            $result = $stmt->execute();
            $stmt->close();
            if ($result) {
                return USER_CREATED_SUCCESSFULLY;
            } else {
                // Failed to create user
                return USER_CREATE_FAILED;
            }
        } else {
            // User with same email already existed in the db
            return USER_ALREADY_EXISTED;
        }
        return $response;
    }
 
    /**
     * Checking user login
     * @param String $email User login email id
     * @param String $password User login password
     * @return boolean User login status success/fail
     */
    public function checkLogin($email, $password) {
        require_once 'PassHash.php';
        $stmt = $this->conn->prepare("SELECT user_password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            //return $user['user_password'];
            if (PassHash::check_password($user['user_password'], $password)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            $stmt->close();
            return NULL;
        }
    }
 
    /**
     * Checking for duplicate user by email address
     * @param String $email email to check in db
     * @return boolean
     */
    private function isUserExists($email) {
        $stmt = $this->conn->prepare("SELECT user_id from users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }
	
	public function getUserByFbId($fb_id) {
        $stmt = $this->conn->prepare("SELECT user_id, user_type, email, first_name, last_name, user_password, fb_id FROM users WHERE fb_id = ?");
        $stmt->bind_param("s", $fb_id);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return NULL;
        }
    }
 
    /**
     * Fetching user by email
     * @param String $email User email id
     */
    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT user_type, email, first_name, last_name, user_password, fb_id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return NULL;
        }
    }
	
	/**
     * Fetching all users
     */
    public function getAllUsers() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->get_result();
        $stmt->close();
        return $users;
    }
	
	/**
     * Fetching all users
     */
    public function getAllUsersByType($user_type) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_type = ?");
		$stmt->bind_param("s", $user_type);
        $stmt->execute();
        $users = $stmt->get_result();
        $stmt->close();
        return $users;
    }


    /* ------------- `post` table method ------------------ */
 
    /**
     * Creating new post
     * @param String $user_id user id to whom post belongs to
     * @param String $post_title
	 * @param String $post_description
	 * @param String $video_link
	 * @param String $thumb_link
     */
    public function createPost($user_id, $post_title, $post_description, $video_link, $thumb_link) {       
        $stmt = $this->conn->prepare("INSERT INTO posts(user_id, post_title, post_description, video_link, thumb_link) VALUES(?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $user_id, $post_title, $post_description, $video_link, $thumb_link);
        $result = $stmt->execute();
        $stmt->close();
		
		if ($result) {
			return USER_CREATED_SUCCESSFULLY;
		} else {
			return USER_CREATE_FAILED;
		}
    }
	
	public function updatePost($fb_like, $fb_share, $total_like_share, $post_id) {       
        $stmt = $this->conn->prepare("UPDATE posts SET fb_like = ?, fb_share = ?, total_like_share = ? WHERE post_id = ?");
        $stmt->bind_param("iiii", $fb_like, $fb_share, $total_like_share, $post_id);
        $result = $stmt->execute();
        $stmt->close();
		
		if ($result) {
			return USER_CREATED_SUCCESSFULLY;
		} else {
			return USER_CREATE_FAILED;
		}
    }
	
	/**
     * Fetching all posts
     */
    public function getAllPosts($pageLimit, $setLimit) {
        $stmt = $this->conn->prepare("SELECT u.first_name, u.last_name, u.email, u.fb_id, p.* FROM posts p INNER JOIN users u ON p.user_id = u.user_id ORDER BY p.post_id DESC LIMIT ?, ?");
        $stmt->bind_param("ss", $pageLimit, $setLimit);
        $stmt->execute();
        $posts = $stmt->get_result();
        $stmt->close();
        return $posts;
    }


    /**
     * Fetching single post by video_link
     * @param String $video_link
     */
    public function getPostByVideo($video_link) {
        $stmt = $this->conn->prepare("SELECT * from posts WHERE video_link = ?");
        $stmt->bind_param("s", $video_link);
        if ($stmt->execute()) {
            $post = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $post;
        } else {
            return NULL;
        }
    }
	/**
     * Fetching all posts
     */
    public function getAllPostsForAdmin() {
        $stmt = $this->conn->prepare("SELECT u.first_name, u.last_name, u.email, u.fb_id, p.* FROM posts p INNER JOIN users u ON p.user_id = u.user_id ORDER BY p.total_like_share DESC, p.post_id DESC");
        $stmt->execute();
        $posts = $stmt->get_result();
        $stmt->close();
        return $posts;
    }
 
    /**
     * Fetching single post
     * @param String $post_id id of the post
     */
    public function getPost($post_id) {
        $stmt = $this->conn->prepare("SELECT * from posts WHERE post_id = ?");
        $stmt->bind_param("i", $post_id);
        if ($stmt->execute()) {
            $post = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $post;
        } else {
            return NULL;
        }
    }
 
    /**
     * Fetching all user posts
     * @param String $user_id id of the user
     */
    public function getAllPostsByUser($user_id, $pageLimit, $setLimit) {
        $stmt = $this->conn->prepare("SELECT u.first_name, u.last_name, u.email, u.fb_id, p.* FROM posts p INNER JOIN users u ON p.user_id = u.user_id WHERE u.user_id = ? ORDER BY p.post_id DESC LIMIT ?, ?");
        $stmt->bind_param("iss", $user_id, $pageLimit, $setLimit);
        $stmt->execute();
        $posts = $stmt->get_result();
        $stmt->close();
        return $posts;
    }



	/**
     * Fetching all user posts
     * @param String $user_id id of the user
     */
    public function getAllPostsByUserForAdmin($user_id) {
        $stmt = $this->conn->prepare("SELECT u.first_name, u.last_name, u.email, u.fb_id, p.* FROM posts p INNER JOIN users u ON p.user_id = u.user_id WHERE u.user_id = ? ORDER BY p.total_like_share DESC, p.post_id DESC");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $posts = $stmt->get_result();
        $stmt->close();
        return $posts;
    }

 
    /**
     * Deleting a post
     * @param String $post_id id of the task to delete
     */
    public function deletePost($post_id) {
        $stmt = $this->conn->prepare("DELETE FROM posts WHERE post_id = ?");
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $num_affected_rows = $stmt->affected_rows;
        $stmt->close();
        return $num_affected_rows > 0;
    }
	
	public function getAllPostsWithPagination($pageLimit, $setLimit) {
        $stmt = $this->conn->prepare("SELECT u.first_name, u.last_name, u.email, u.fb_id, p.* FROM posts p INNER JOIN users u ON p.user_id = u.user_id ORDER BY p.post_id DESC LIMIT ?, ?");
  		$stmt->bind_param("ss", $pageLimit, $setLimit);
        $stmt->execute();
        $users = $stmt->get_result();
        $stmt->close();
        return $users;
    }

    public function displayPaginationBelow($per_page,$page){
        $page_url="?";
        $stmt = $this->conn->prepare("SELECT COUNT(*) as totalCount FROM posts p INNER JOIN users u ON p.user_id = u.user_id");
        $stmt->execute();
        $posts = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        $total = $posts['totalCount'];
        $adjacents = "2";

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;
        $setLastpage = ceil($total/$per_page);
        $lpm1 = $setLastpage - 1;

        $setPaginate = "";
        if($setLastpage > 1){
            $setPaginate .= "<ul class='setPaginate'>";
            $setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
            if($setLastpage < 7 + ($adjacents * 2)){
                for ($counter = 1; $counter <= $setLastpage; $counter++)
                {
                    if ($counter == $page){
                        $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                    }else{
                        $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                    }
                }
            }elseif($setLastpage > 5 + ($adjacents * 2)){
                if($page < 1 + ($adjacents * 2)){
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page){
                            $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                        }else{
                            $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                        }
                    }
                    $setPaginate.= "<li class='dot'>...</li>";
                    $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                    $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
                }elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)){
                    $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
                    $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
                    $setPaginate.= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page){
                            $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                        }else{
                            $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                        }
                    }
                    $setPaginate.= "<li class='dot'>..</li>";
                    $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                    $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
                }else{
                    $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
                    $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
                    $setPaginate.= "<li class='dot'>..</li>";
                    for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++){
                        if ($counter == $page){
                            $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                        }else{
                            $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                        }
                    }
                }
            }

            if ($page < $counter - 1){
                $setPaginate.= "<li><a href='{$page_url}page=$next'> <i class='fa fa-angle-right'></i> </a></li>";
                $setPaginate.= "<li style='display:none;'><a href='{$page_url}page=$setLastpage'>Last</a></li>";
            }else{
                $setPaginate.= "<li><a class='current_page'>Next</a></li>";
                $setPaginate.= "<li><a class='current_page'>Last</a></li>";
            }

            $setPaginate.= "</ul>\n";
        }
        return $setPaginate;
    }


    public function search(searchText) {
        $search = "%{searchText}%";
        $sql = "SELECT * FROM tableName WHERE FieldName1 LIKE ? OR FieldName2 LIKE ? OR FieldName3 LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $search);
        $stmt->execute();
        $results = $stmt->get_result();
        $stmt->close();
        return $results;
    }
 
}
 
?>