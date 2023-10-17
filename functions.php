<?php
// require_once('send_mail.php'); 
function user_login() {
	$db = $GLOBALS['db'];
	$email = mysqli_real_escape_string($db, $_POST['login_email']);
	$pass = mysqli_real_escape_string($db, $_POST['login_password']);



	$user_query = "SELECT * FROM `users` WHERE `user_email`='{$email}'  AND (user_activation_key IS NULL OR user_activation_key = '') LIMIT 1";
	$users_results = mysqli_query($db, $user_query);

	$user = mysqli_fetch_assoc($users_results);

	if(!empty($user) && password_verify($pass , $user['user_pass'])){
		$_SESSION = array_merge($_SESSION, $user);

    }
    $_SESSION['error_message'] = "Wrong credentials";

    return '';
}

function user_register(){
	$db = $GLOBALS['db'];
//    $pass_crypt = password_hash('12345678' , PASSWORD_BCRYPT);
//    $insert_admin = mysqli_query($db, "INSERT INTO `admin` (`admin_name` , `admin_email` , `admin_password` ) VALUES ('admin' ,'admin@gmail.com' , '{$pass_crypt}' )");
//    $user_id = mysqli_insert_id($db);
//    exit;

    $name = mysqli_real_escape_string($db, $_POST['register_name']);
	$email = mysqli_real_escape_string($db, $_POST['register_email']);
	$address = mysqli_real_escape_string($db, $_POST['register_address']);
    $dob = mysqli_real_escape_string($db, $_POST['register_dob']);

    $role = mysqli_real_escape_string($db, $_POST['register_user_role']);

	$pass = mysqli_real_escape_string($db, $_POST['register_password']);
	$pass_crypt = password_hash($pass , PASSWORD_BCRYPT);
    $activation_key = uniqid();


	if( !empty($name) && !empty($email) && !empty($role) && !empty($pass_crypt)  && !empty($address)  && !empty($dob))
    {

        $query = "SELECT * FROM `users` WHERE `user_email` = '{$email}'";
        $users_results = mysqli_query($db, $query);

//        echo $role;
//        exit;
        if(($users_results->num_rows)>0)
        {
            $_SESSION['error_message'] = "Email already exists";
            return $user_id ?? null;

        }

//        print_r($users_results->num_rows);
//        exit;
        $phone_number = mysqli_real_escape_string($db, $_POST['register_phoneno']);

        $insert_user = mysqli_query($db, "INSERT INTO `users` (`user_fullname` , `user_email` , `user_pass` , `user_address` , `user_dob` , `user_role`, `user_phone_number`,`user_image`, `user_activation_key`) VALUES ('{$name}' ,'{$email}' , '{$pass_crypt}', '{$address}' , '{$dob}','{$role}','{$phone_number}','default.png', '{$activation_key}')");
		$user_id = mysqli_insert_id($db);


        if($role==2)
        {
            $first_name = mysqli_real_escape_string($db, $_POST['register_first_name']);
            $last_name = mysqli_real_escape_string($db, $_POST['register_last_name']);
            $nationality = mysqli_real_escape_string($db, $_POST['register_nationality']);
            $ethnicity = mysqli_real_escape_string($db, $_POST['register_ethnicity']);

            $education = mysqli_real_escape_string($db, $_POST['register_education']);
            $research_experience = mysqli_real_escape_string($db, $_POST['register_research_experience']);


            $insert_urm_candidate = mysqli_query($db, "INSERT INTO `urm_candidates` (`user_id` , `first_name`, `last_name`, `email`, `nationality`, `ethnicity`, `education`, `research_experience` , `phone_number` ) VALUES ('{$user_id}','{$first_name}' ,'{$last_name}'  ,'{$email}' ,'{$nationality}' ,'{$ethnicity}' ,'{$education}' ,'{$research_experience}', '{$phone_number}')");
            $_SESSION['success_message'] = "Your has successfully created ";

        }
        else  if($role==3) //academia
        {
            $phone_number = mysqli_real_escape_string($db, $_POST['register_phoneno']);
            $iname = mysqli_real_escape_string($db, $_POST['register_institution_name']);
            $iaddress = mysqli_real_escape_string($db, $_POST['register_institution_address']);

            $insert_academia = mysqli_query($db, "INSERT INTO `academia` (`user_id` ,`institution_name` ,`institution_address`	, `phone_number` ) VALUES ('{$user_id}'  ,'{$iname}','{$iaddress}', '{$phone_number}')");
            $_SESSION['success_message'] = "Your has successfully created ";

        }
        else  if($role==4) //recruiters
        {
            $phone_number = mysqli_real_escape_string($db, $_POST['register_phoneno']);
            $iname = mysqli_real_escape_string($db, $_POST['register_company_name']);
            $iaddress = mysqli_real_escape_string($db, $_POST['register_company_address']);

            $insert_academia = mysqli_query($db, "INSERT INTO `recruiters` (`user_id` ,`company_name` ,`company_address`	, `phone_number` ) VALUES ('{$user_id}'  ,'{$iname}','{$iaddress}', '{$phone_number}')");
            $_SESSION['success_message'] = "Your has successfully created ";

        }
        else  if($role==5) //DEI officers
        {
            $phone_number = mysqli_real_escape_string($db, $_POST['register_phoneno']);
            $iname = mysqli_real_escape_string($db, $_POST['register_organization_name']);
            $iaddress = mysqli_real_escape_string($db, $_POST['register_organization_address']);

            $insert_academia = mysqli_query($db, "INSERT INTO `dei_officers` (`user_id` ,`organization_name` ,`organization_address`	, `phone_number` ) VALUES ('{$user_id}'  ,'{$iname}','{$iaddress}', '{$phone_number}')");
            $_SESSION['success_message'] = "Your has successfully created ";

        }
        send_welcome($user_id);
		return $user_id ?? null;
	}
}

function get_user_data(){
    $db = $GLOBALS['db'];
    $role = $_SESSION ['user_role'];

    $user_id = $_SESSION ['user_id'];

    $users = [];


    $user_count=0;
    if($role==2) // urm candidates
    {

          $query = "SELECT * FROM `urm_candidates` WHERE `user_id` = '{$user_id}' LIMIT 1";
          $users_results = mysqli_query($db, $query);
            $user = mysqli_fetch_assoc($users_results);

            $users[$user_count]['key']= "Nationality";
            $users[$user_count]['value'] =   $user['nationality'];
            $user_count++;


            $users[$user_count]['key']= "Ethnicity";
            $users[$user_count]['value'] =   $user['ethnicity'];
            $user_count++;


            $users[$user_count]['key']= "Education";
            $users[$user_count]['value'] =   $user['education'];
            $user_count++;





            $users[$user_count]['key']= "Research Experience";
            $users[$user_count]['value'] =   $user['research_experience'];
            $user_count++;

            $users[$user_count]['key']= "Phone number";
            $users[$user_count]['value'] =   $user['phone_number'];

    }
    else  if($role==3) //academia
    {
        $query = "SELECT * FROM `academia` WHERE `user_id` = '{$user_id}' LIMIT 1";
        $users_results = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($users_results);

        $users[$user_count]['key']= "Institution Name";
        $users[$user_count]['value'] =   $user['institution_name'];
        $user_count++;

        $users[$user_count]['key']= "Institution Address";
        $users[$user_count]['value'] =   $user['institution_address'];
        $user_count++;

        $users[$user_count]['key']= "Phone number";
        $users[$user_count]['value'] =   $user['phone_number'];



    }
    else  if($role==4) //recruiters
    {
        $query = "SELECT * FROM `recruiters` WHERE `user_id` = '{$user_id}' LIMIT 1";
        $users_results = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($users_results);
        $users[$user_count]['key']= "Company Name";
        $users[$user_count]['value'] =   $user['company_name'];
        $user_count++;

        $users[$user_count]['key']= "Institution Address";
        $users[$user_count]['value'] =   $user['company_address'];
        $user_count++;

        $users[$user_count]['key']= "Phone number";
        $users[$user_count]['value'] =   $user['phone_number'];
    }
    else  if($role==5) //DEI officers
    {
        $query = "SELECT * FROM `dei_officers` WHERE `user_id` = '{$user_id}' LIMIT 1";
        $users_results = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($users_results);
        $users[$user_count]['key']= "Organization Name";
        $users[$user_count]['value'] =   $user['organization_name'];
        $user_count++;

        $users[$user_count]['key']= "Organization Address";
        $users[$user_count]['value'] =   $user['organization_address'];
        $user_count++;

        $users[$user_count]['key']= "Phone number";
        $users[$user_count]['value'] =   $user['phone_number'];


    }
//    print_r(($users));
//    exit;


    return $users;
}
function submit_contact(){
	$db = $GLOBALS['db'];
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$question = mysqli_real_escape_string($db, $_POST['question']);
	if( !empty($name) && !empty($email) && !empty($question) ){
		$insert_user = mysqli_query($db, "INSERT INTO `inquiry` (`inq_sender_name	` , `	inq_sender-query	` , `sender_email` , ) VALUES ('{$name}' ,'{$msg}', '{$email}' , )");
	}
}
function upload_image() {
    $db = $GLOBALS['db'];
    $uploadDir=  UPLOAD_DIR . 'UsersProfile/';
    // Configuration
    $allowedExtensions = array("jpg", "jpeg", "png", "gif"); // Allowed file extensions

    // Get the uploaded file information
    $fileName = $_FILES["imageFile"]["name"];
    $fileTmpName = $_FILES["imageFile"]["tmp_name"];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

//    echo "hello";
//    exit;
    // Check if the file extension is allowed
    if (in_array($fileExtension, $allowedExtensions)) {
        // Generate a unique filename to avoid overwriting existing files
        $uniqueFileName = uniqid() . "." . $fileExtension;
        $destination = $uploadDir . $uniqueFileName;

        // Attempt to move the uploaded file to the destination directory
        if (move_uploaded_file($fileTmpName, $destination)) {
            $final_directory = 'src/UsersProfile/'. $uniqueFileName;

            $update_user_image = mysqli_query($db, "UPDATE `users` SET `user_image`='{$uniqueFileName}' WHERE `user_id` = {$_SESSION['user_id']}");
            if(!empty($update_user_image)){
                $_SESSION['user_image'] = $uniqueFileName;

                $_SESSION['success_message'] = "Image uploaded successfully ";
            }
        } else {
            $_SESSION['error_message'] = "Failed to upload file.";

        }
    } else {
        $_SESSION['error_message'] = "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";

    }


    return '';

}
function get_posts(){
    $db = $GLOBALS['db'];
    $query = "SELECT posts.*, users.user_fullname, users.user_role FROM `posts` INNER JOIN `users` ON `post_user_id` = `user_id` ";
    $posts_results = mysqli_query($db, $query);
    $posts = [];
    while ($post = mysqli_fetch_assoc($posts_results)){
        $posts[] = $post;
    }
    return $posts;
}

function get_feedback(){
    $db = $GLOBALS['db'];
    $query = "SELECT feedback_reviews.*, users.user_fullname, users.user_role,users.user_image FROM `feedback_reviews` INNER JOIN `users` ON `feedback_reviews`.`user_id` = `users`.`user_id` ";
    $posts_results = mysqli_query($db, $query);
    $posts = [];
    while ($post = mysqli_fetch_assoc($posts_results)){
        $posts[] = $post;
    }
    return $posts;
}


function get_user_email($user_id){
    $db = $GLOBALS['db'];
    $query = "SELECT * FROM `users` where `user_id` = '{$user_id}' LIMIT 1 ";
    $user_results = mysqli_fetch_assoc(mysqli_query($db, $query));


    return $user_results['user_email'];
}
function get_post_name($post_id){
    $db = $GLOBALS['db'];
    $query = "SELECT * FROM `posts` where `post_id` = '{$post_id}' LIMIT 1 ";
    $post_results = mysqli_fetch_assoc(mysqli_query($db, $query));


    return $post_results['post_name'];
}

function get_candidate_info($user_id){
    $db = $GLOBALS['db'];
    $query = "SELECT * FROM `urm_candidates` where `user_id` = '{$user_id}' LIMIT 1 ";
    $candidate_results = mysqli_fetch_assoc(mysqli_query($db, $query));


    return $candidate_results;
}

function apply_job_submit(){
    $db = $GLOBALS['db'];


    $upload_cv = upload_file('cv', UPLOAD_DIR.'candidate_docs/CV/');
    $cv = (!empty($upload_cv))? $upload_cv: 'empty.jpg';

    $upload_cover_letter = upload_file('cover_letter', UPLOAD_DIR.'candidate_docs/CoverLetter/');
    $cover_letter = (!empty($upload_cover_letter))? $upload_cover_letter: 'empty.jpg';

    $user_id =  $_SESSION['user_id'];
    $candidate_id = (get_candidate_info($_SESSION['user_id']))['urm_candidate_id'];
    $post_id =  $_GET['post_id'];
    $applied_to_user_id = (get_post_by_id( $post_id))['post_user_id'];


    $insert_job_applied_users = mysqli_query($db, "INSERT INTO `job_applied_users` (`user_id`, `candidate_id`, `post_id`, `user_cv`, `user_cover_letter`, `status`, `applied_to_user_id`) VALUES ('{$user_id}','{$candidate_id}','{$post_id}','{$cv}','{$cover_letter}','Pending','{$applied_to_user_id}')");
    $_SESSION['success_message'] = "You have successfully applied for a job ";

    return mysqli_insert_id($db) ?? null;

}
function upload_file($file_field , $target_dir = UPLOAD_DIR) {
    if(!empty($_FILES[$file_field])) {
        $target_file = $target_dir . basename($_FILES[$file_field]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $filename = uniqid(). '.' . $imageFileType;
        $upload_file = $target_dir . $filename;

        if (move_uploaded_file($_FILES[$file_field]["tmp_name"], $upload_file)) {
            return $filename;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function get_post_by_id($id){
    $db = $GLOBALS['db'];
    $query = "SELECT * FROM `posts` WHERE `post_id` = {$id} LIMIT 1";
    $posts_results = mysqli_query($db, $query);
    return mysqli_fetch_assoc($posts_results) ?? null;
}


function feedback_submit(){
    $db = $GLOBALS['db'];


    $message = mysqli_real_escape_string($db, $_POST['input_messsage']);
    $rating = mysqli_real_escape_string($db, $_POST['input_rating']);

    if(empty($rating))
    {
        $_SESSION['error_message'] = "Please give rating ";
        return ;

    }
    $user_id =  $_SESSION['user_id'];
    $date = date('Y-m-d');


    $insert_feedback = mysqli_query($db, "INSERT INTO `feedback_reviews` (`user_id`, `feedback_message`, `rating`, `feedback_date`) VALUES ('{$user_id}','{$message}','{$rating}','{$date}')");
    $_SESSION['success_message'] = "Feedback submitted successfully ";

    return mysqli_insert_id($db) ?? null;

}
function get_user_by_id($id){
    $db = $GLOBALS['db'];
    $query = "SELECT * FROM `users` WHERE `user_id` = {$id}";
    $users_results = mysqli_query($db, $query);
    return mysqli_fetch_assoc($users_results) ?? null;
}
function activate_user(){
    $db = $GLOBALS['db'];
    $email = mysqli_real_escape_string($db, $_GET['user_email']);
    $activation_key = mysqli_real_escape_string($db, $_GET['activation_key']);

    $user_query = "SELECT * FROM `users` WHERE `user_email`='{$email}' AND `user_activation_key` = '{$activation_key}' LIMIT 1";
    $users_results = mysqli_query($db, $user_query);
    $user = mysqli_fetch_assoc($users_results);
    if(!empty($user)){
        $query = "UPDATE `users` SET `user_activation_key`='' WHERE `user_email`='{$email}'";
        $activated = mysqli_query($db, $query);
        if($activated){
            header('location:index.php');
        }
    }
}
function forget_password(){
    $db = $GLOBALS['db'];
    $email = mysqli_real_escape_string($db, $_POST['user_email']);

    $user_query = "SELECT * FROM `users` WHERE `user_email`='{$email}'  LIMIT 1";
    $users_results = mysqli_query($db, $user_query);
    $user = mysqli_fetch_assoc($users_results);


    if(!empty($user)){

            $new_password =generateRandomPassword(10);;
             $pass_crypt = password_hash($new_password , PASSWORD_BCRYPT);

             $query = "UPDATE `users` SET `user_pass`='{$pass_crypt}' WHERE `user_email`='{$email}'";
            $activated = mysqli_query($db, $query);
            if($activated){
//                echo $new_password;
//                exit;
                send_forget_password_mail($user['user_id'],$new_password);
            }
    }
    else
    {
        $_SESSION['error_message']="Email not exists";
    }
}
function generateRandomPassword($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';

    $characterCount = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, $characterCount - 1);
        $password .= $characters[$randomIndex];
    }

    return $password;
}
