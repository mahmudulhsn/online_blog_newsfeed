<?php
	
	$conn = mysqli_connect("localhost", "root", "", "newsfeed");

	// define('ALLOWED_IMG_EXTENSIONS',['jpg','png','gif','jpeg']);

	//check if the username is exixts or not from author table
	// check author exists or not
	function authorExists($author_username){
		global $conn;
		$query = mysqli_query($conn, "SELECT author_username FROM author WHERE author_username = '$author_username'");
		$data = mysqli_fetch_assoc($query);
		return ($data['author_username'] == $author_username)?true:false;
	}

	//author registration will happen with this function
	function authorRegistration($author_name, $author_username, $author_email, $author_role, $author_pass){
		global $conn;
		return mysqli_query($conn, "INSERT INTO author(author_name, author_username, author_email, author_role, author_pass) VALUES('$author_name', '$author_username', '$author_email', '$author_role', '$author_pass')");
	}

	//check whether the username is valid or not
	function isValidUsername($username){
		$to_array=explode(' ', $username);
		$to_string=implode('', $to_array);
		$trim=trim($to_string);
		$lower=strtolower($trim);
		return ($username==$lower)?true:false;
	}

	//fetch all author from database from author table
	function fetchAllAuthor(){
		global $conn;
		return mysqli_query($conn, "SELECT * FROM author");
	}

	//delete author 
	function deleteAuthor($author_id){
		global $conn;
		return mysqli_query($conn, 	"DELETE FROM author WHERE author_id = '$author_id'");
	}

	//fetch single author 
	function findAuthor($author_id){
		global $conn;
		return mysqli_query($conn, "SELECT * FROM author WHERE author_id = '$author_id'");
	}

	//this function update the author ingo
	//update author
	function authorUpdate($author_id, $author_name, $author_email, $author_role, $author_pass){
		global $conn;
		return mysqli_query($conn, "UPDATE author SET 
			author_name = '$author_name',
			author_email = '$author_email', 
			author_role = '$author_role', 
			author_pass = '$author_pass'

			WHERE 	author_id = '$author_id'");
	}


	/* category area starts */

	// 
	function categoryExists($cat_name){
		global $conn;
		$query = mysqli_query($conn, "SELECT category.cat_name FROM category WHERE cat_name = '$cat_name'");
		$data = mysqli_fetch_assoc($query);
		return($data['cat_name'] == $cat_name)?true:false;
	}
	//add category
	function addNewCategory($cat_name){
		global $conn;
		return mysqli_query($conn, "INSERT INTO category(cat_name) VALUES('$cat_name')");
	}

	//fetch all the category from the category table
	function fetchAllCategory(){
		global $conn;
		return mysqli_query($conn, "SELECT * FROM category");
	}

	//delete category
	function deleteCategory($cat_id){
		global $conn;
		return mysqli_query($conn, 	"DELETE FROM category WHERE cat_id = '$cat_id'");
	}

	//fetch single category
	function findCategory($cat_id){
		global $conn;
		return mysqli_query($conn, "SELECT * FROM category WHERE cat_id = '$cat_id'");
	}

	// if avaiable category
	function categoryAvailable(){
		global $conn;
		$query=mysqli_query($conn,"SELECT cat_id FROM category");
		$count=mysqli_num_rows($query);
		return ($count>0)?true:false;
	}




	//posts area starts here 

	//add post
	function addNewPost($post_title, $post_content, $post_thumb, $post_tags, $cat_id, $author_id){
		global $conn;
		$query = "INSERT INTO post(post_title, post_content, post_thumb, post_tags, cat_id, author_id) VALUES('$post_title', '$post_content', '$post_thumb', '$post_tags', '$cat_id', '$author_id')";
		$result =  mysqli_query($conn, $query);
		return $result;
	}

	

    //fetch all post
    function fetchAllPost(){
    	global $conn;
    	return mysqli_query($conn, "SELECT post.post_title, post.publishing_date, category.cat_name, author.author_name, post.post_thumb, post.post_id FROM post JOIN category JOIN author WHERE post.cat_id = category.cat_id AND post.author_id = author.author_id ORDER BY post_id DESC");
    }

    //delete single post
    function deletePost($post_id){
    	global $conn;
		return mysqli_query($conn, 	"DELETE FROM post WHERE post_id = '$post_id'");
    }

    //find single post
    function findpost($post_id){
		global $conn;
		return mysqli_query($conn, "SELECT * FROM post WHERE post_id = '$post_id'");
	}

	//update post
	function postUpdate($post_id, $post_title, $post_content, $post_thumb, $post_tags, $cat_id, $author_id){
		global $conn;
		$query = "UPDATE post SET 
			post_title = '$post_title',
			post_content = '$post_content', 
			post_thumb = '$post_thumb',
			post_tags = '$post_tags',
			cat_id = '$cat_id',
			author_id = '$author_id'

			WHERE 	post_id = '$post_id'";
		$result =  mysqli_query($conn, $query);
		return $result;
	}

	//it will locate the image file
	// function show_post_img($img_dir){
	// 	printf('<img src="%s"/>',$img_dir);
	// }

	// // it will check is image valode or not
	// function is_an_image($file_name){
 //    	$to_array=explode('.', $file_name);
 //    	$last_ele=end($to_array);
 //    	return (in_array($last_ele, ALLOWED_IMG_EXTENSIONS))?true:false;
 //    }

	


	/*functions fot front-edn starts here */
	//  fetch single post
   	function fetchSinglePost($post_id){
   		global $conn;
   		return mysqli_query($conn, "SELECT post.post_title, post.post_thumb, post.post_content, post.publishing_date, category.cat_name, author.author_name, post.count_post_views, category.cat_id FROM post JOIN category JOIN author ON category.cat_id = post.cat_id AND post.author_id = author.author_id 	WHERE post.post_id = '$post_id'");
   	}

	//fetch headline post
	function fetchHeadlinePost(){
		global $conn;
		return mysqli_query($conn, "SELECT post.post_title, post.post_thumb, post.post_id FROM post ORDER BY post_id DESC LIMIT 10");
	}

	//fetching all the tags according to the posts
    function fetchPostTags($post_id){
    	global $conn;
    	$query=mysqli_query($conn,"SELECT post.post_tags FROM post WHERE post.post_id='$post_id'");
    	$find_tags=mysqli_fetch_assoc($query);
    	$to_array=explode(',', $find_tags['post_tags']);
    	for($count=0;$count<count($to_array);$count++){
    		printf('<a class="btn btn-info" style="margin:3px;" href="">%s</a>',$to_array[$count]);
    	}
    }

    //fetch related category
   	function fetchRelatedPost($cat_name, $post_id){
   		global $conn;
   		return mysqli_query($conn, "SELECT post.post_title,post.post_thumb, category.cat_name, post.post_id FROM post JOIN category ON post.cat_id = category.cat_id WHERE category.cat_name = '$cat_name' AND post.post_id != '$post_id' ORDER BY post_id DESC LIMIT 4");
   	}

	//excerpt of
	function exerpt($post_content, $content){
		echo substr($post_content, 0, $content);
	}

	//fetch all slider post
	function fetchAllSliderPost(){
		global $conn;
		$query = mysqli_query($conn, "SELECT post.post_id,post.post_title, post.post_content,post.post_thumb FROM post ORDER BY post_id DESC LIMIT 10");
		return $query;
	}

	//fetch first post of the category
   	function fetchFirstPostOfCagegory($cat_id){
   		global $conn;
   		return mysqli_query($conn, "SELECT * FROM post JOIN category ON post.cat_id = category.cat_id  WHERE category.cat_id = '$cat_id' ORDER BY post.post_id DESC LIMIT 1");
   	}

   	//fetch all side post of the category
   	function fetchSidePostsOfCagegory($cat_id){
   		global $conn;
   		return mysqli_query($conn, "SELECT * FROM post JOIN category ON post.cat_id = category.cat_id WHERE category.cat_id = '$cat_id' ORDER BY post.post_id DESC LIMIT 4 OFFSET 1");
   	}

   	//fecth random post
   	function fetchRandomPosts(){
   		global $conn;
   		return mysqli_query($conn, "SELECT RAND(6) FROM post");
   	}



   	/* theme option starts here */

   	//logo upload function
   	function logoUpload($image_name){
		global $conn;
		$query = "INSERT INTO image(image_name) VALUES('$image_name')";
		$result =  mysqli_query($conn, $query);
		if ($result) {
			 echo "<h2 class='btn-success'>Logo Uploaded successfully.</h2>";
        }else{
          echo "<h2 class='btn-danger'>Error!!</h2>";
        }
	}

	//fetch logo from database 
	function fetchLogo(){
		global $conn;
		return mysqli_query($conn, "SELECT * FROM image ORDER BY image_id DESC LIMIT 1");
	}

	//check login log out
	function checkLogin($username){
		global $conn;
		return mysqli_query($conn, "SELECT * FROM author WHERE username = '$username'");
	}


   //check whether the user is admin  or not
	function is_admin($username){
		global $conn;
		$query=mysqli_query($conn,"SELECT author_role FROM author WHERE author_username='$username'");
		$find_role=mysqli_fetch_assoc($query);
		return ($find_role['author_role']=='admin')?true:false;
	}

	//check whether the user is author or not
	function is_author($username){
		global $conn;
		$query=mysqli_query($conn,"SELECT author_role FROM author WHERE author_username='$username'");
		$find_role=mysqli_fetch_assoc($query);
		return ($find_role['author_role']=='author')?true:false;
	}

	//check user loging status
	function is_loggedin(){
		return (isset($_SESSION['username']) || isset($_COOKIE['username']))?true:false;
	}

	//log the user in
	function login($username,$password){
		global $conn;
		$query=mysqli_query($conn,"SELECT author_username,author_pass FROM author WHERE author_username='$username' AND author_pass='$password'");
		$count=mysqli_num_rows($query);
		if($count>0){
			if(isset($_POST['remember'])){
				setcookie('username',$username,time()+3600);
				$_COOKIE['username']=$username;
				if(isset($_COOKIE['username'])){
					$username=$_COOKIE['username'];
					if(is_admin($username)){
						redirect('index.php');
					}else if(is_author($username)){
						redirect('index.php');
					}
				}
				
			}else if(!isset($_POST['remember'])){
				session_start();
				session_regenerate_id();
				$_SESSION['username']=$username;
				if(isset($_SESSION['username'])){
					$username=$_SESSION['username'];
					if(is_admin($username)){
						redirect('index.php');
					}else if(is_author($username)){
						redirect('index.php');
					}
				}				
			}
		}else{
			echo "<h2 class='text btn-danger'>ERROR!! Username/Password is incorrect.</h2>";
		}
	}

	//redirect to url
	function redirect($url){
		header('Location:'.$url);
	}

	//get username according to session/cookie
	function get_username($username){
		if(isset($_SESSION[$username]) || isset($_COOKIE[$username])){
			if(isset($_SESSION[$username])){
				return $_SESSION[$username];
			}else if(isset($_COOKIE[$username])){
				return $_COOKIE[$username];
			}
		}
	}

	//fetch user role
	function get_role($username){
		global $conn;
		$query=mysqli_query($conn,"SELECT author_role FROM author WHERE author_username='$username'");
		$find_role=mysqli_fetch_assoc($query);
		echo $find_role['author_role'];
	}


	/* message options */
	//insert message
	function addMessage($msg_name, $msg_email, $msg_body){
		global $conn;
		return mysqli_query($conn, "INSERT INTO message(msg_name, msg_email, msg_body) VALUES('$msg_name', '$msg_email', '$msg_body')");
	}

	//fetch all message
	function fetchAllMessage(){
		global $conn;
		return mysqli_query($conn, "SELECT * FROM message ORDER BY msg_id DESC");
	}
	//get username form sessain
	function fetchName($username){
		global $conn;
		$query = mysqli_query($conn, "SELECT * FROM author WHERE author_username = '$username'");
		$findname = mysqli_fetch_assoc($query);
		echo $findname['author_name'];
	}

	//get userID form sessain
	function fetchAuthorID($username){
		global $conn;
		$query = mysqli_query($conn, "SELECT * FROM author WHERE author_username = '$username'");
		$findname = mysqli_fetch_assoc($query);
		return $findname['author_id'];
	}
	
	/* comments area starts*/
	//add comments
	function addComment($cmnt_name, $cmnt_body, $post_id){
		global $conn;
		return mysqli_query($conn, "INSERT INTO comments(cmnt_name, cmnt_body, post_id) VALUES('$cmnt_name', '$cmnt_body', '$post_id')");
	}
	//fetch comments
	function fetchComments($post_id){
		global $conn;
		return mysqli_query($conn, "SELECT comments.*,post.* FROM post JOIN comments ON comments.post_id=post.post_id AND comments.post_id = '$post_id' ORDER BY cmnt_id DESC");
	}

	function post_view_count($post_id){
		global $conn;
		return mysqli_query($conn,"UPDATE post SET count_post_views=count_post_views+1 WHERE post_id='$post_id'");
	}
	function popilarPost(){
		global $conn;
		return mysqli_query($conn, "SELECT * FROM post ORDER BY count_post_views DESC LIMIT 4");
	}


	//fetch category post from category to category page
	function fetchCategoryPost($cat_id){
		global $conn;
		return mysqli_query($conn, "SELECT post.post_title, post.post_thumb, post.post_id, post.post_content, category.cat_name, category.cat_id FROM post JOIN category ON post.cat_id = category.cat_id  WHERE category.cat_id = '$cat_id' ORDER BY post.post_id DESC LIMIT 10");
	}

	//fetch tags post from tags to tag page
	// function fetchTagsPost($post_tags){
	// 	global $conn;
	// 	return mysqli_query($conn, "SELECT post.post_title, post.post_thumb, post.post_id, post.post_content, category.cat_name, category.cat_id FROM post JOIN category ON post.cat_id = category.cat_id  WHERE post.post_tags = '$post_tags' ORDER BY post.post_id DESC LIMIT 10");
	// }


 ?>