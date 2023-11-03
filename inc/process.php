<?php

require "connection.php";



// USER CREATE ACCOUNT
if(isset($_POST["register"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $encrypt_password = md5($password);

    //check if user exist
    $sql_check = "SELECT * FROM users WHERE email = '$email'";
    $query_check = mysqli_query($connection,$sql_check);
    if(mysqli_fetch_assoc($query_check)){
        //user exists
        $error = "User already exist";
    }else{
         //insert into DB
        $sql = "INSERT INTO users(name,email,password) 
               VALUES('$name','$email','$encrypt_password')";
        $query = mysqli_query($connection,$sql) or die("Cant save data");
        $success = "Registration successfully";
    }  
}


//USER LOGIN
if(isset($_POST["login"])){

    $email = $_POST["email"];
    $password = $_POST["password"];
    $encrypt_password = md5($password);

    //check if user exist
    $sql_check2 = "SELECT * FROM users WHERE email = '$email'";
    $query_check2 = mysqli_query($connection,$sql_check2);
    if(mysqli_fetch_assoc($query_check2)){
       //check if email and password exist
       $sql_check = "SELECT * FROM users WHERE email = '$email' AND password = '$encrypt_password'";
       $query_check = mysqli_query($connection,$sql_check);
       if($result = mysqli_fetch_assoc($query_check)){
       //Login to dashboard
       $_SESSION["user"] = $result;
       if($result["role"] == "user"){
        header("location: forum.php");
       }else{
        header("location: dashboard.php");
       } 
       $success = "User logged in";       
     }else{ 
    //user password wrong
    $error = "User password wrong";
}  
       }else{
        //user not found
        $error = "User email not found";
  } 
}


// ADD NEW QUESTION
// if(isset($_POST["new_question"])){
//         $title = $_POST["title"];
//         $content = $_POST["content"];
    
//         //sql
//         $sql = "INSERT INTO posts(title,content) VALUES ('$title','$content')";
//         $query = mysqli_query($connection,$sql);
//         if($query){
//            //success message
//             $success = "Question added Succesfully";
//         }else{
//             $error = "Unable to add question";
//         }  
// }

if (isset($_POST["new_question"])) {
    $title = mysqli_real_escape_string($connection, $_POST["title"]);
    $content = mysqli_real_escape_string($connection, $_POST["content"]);


    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use prepared statement to insert data
    $sql = "INSERT INTO posts (title, content) VALUES (?, ?)";
    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "ss", $title, $content);

        if (mysqli_stmt_execute($stmt)) {
            // Success message
            $success = "Question added successfully";
        } else {
            // Error message
            $error = "Unable to add question";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($connection);
}


//ADD COMMENT
if(isset($_POST["comment_new"])){
    $comment = $_POST["comment"];
    $user_id = $_SESSION["user"]["id"];
    $post_id = $_GET["question_id"];
    
    if(empty($_POST["comment"])){
        $error = "Your comment is required!";
    }else{
        
        //sql & query
        $sql = "INSERT INTO comments(user_id,message,post_id) VALUES('$user_id','$comment','$post_id')";
        $query = mysqli_query($connection,$sql);
        //check if
        if($query){
            $success = "Comment Succefully Added";
        }else{
            $error = "Unable to add comment";
        }
    }
    
}




?>