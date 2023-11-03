<?php

session_start();

 require "inc/process.php";
 require "inc/header.php";  
 if(isset($_GET["question_id"]) && !empty($_GET["question_id"])){
     $id = $_GET["question_id"];
     //sql & query
     $sql = "SELECT * FROM posts WHERE id ='$id' ";
     $query = mysqli_query($connection,$sql);
     //result
     $result = mysqli_fetch_assoc($query);
 }else{
     header("location: index.php");
 }
 //session to store url
 $_SESSION["url"] = $_GET["question_id"];
?>

<div class="container">
<div class="container mt-5 text-center">
            <i class="fas fa-graduation-cap fa-4x text-danger mb-3"></i> <!-- Student Discussion Icon -->
            <h4 class="display-4">Student Discussion Forum</h4>
            <p class="lead">Unlocking Knowledge, Igniting Conversations: Join the Student Discourse!</p>
            </div>
            <hr>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-8">
                <?php 
         if(isset($error)) {
            ?>
                <div class="alert alert-danger">
                    <strong><?php echo $error ?></strong>
                </div>
                <?php
         }elseif (isset($success)) {
            ?>
                <div class="alert alert-success">
                    <strong><?php echo $success ?></strong>
                </div>
                <?php
        }
        ?>
                
                <div class="content">
                    <p>
                        <?php echo $result["content"] ?>
                    </p>
                </div>
                <hr>
                <div>
                    <h5>Reply's</h5>
                    <?php
                  $sql = "SELECT * FROM comments WHERE post_id='$id' ";
                  $query4 = mysqli_query($connection,$sql);
                  $result3 = mysqli_fetch_assoc($query4);
                  if($result3){
                    $query = mysqli_query($connection,$sql);
                  while($result2 = mysqli_fetch_assoc($query)){
                      ?>
                    <div class="row">
                        <div class="col-6">
                            <?php
                            $user_id = $result2["user_id"];
                            $sql2 = "SELECT * FROM users WHERE id ='$user_id'";
                            $query2 = mysqli_query($connection,$sql2);
                            $result4 = mysqli_fetch_assoc($query2);  
                            ?>
                            <p>
                                <?php  echo $result4["name"]; ?>
                                <br>
                                <small>
                                    <?php echo date("F j Y h:i:s a", strtotime($result2["timestamp"]));?>
                                </small>
                            </p>
                        </div>
                        <div class="col-6">
                            <?php  echo $result2["message"]; ?>
                        </div>
                    </div>

                    <?php
                  }
                }else{
                    echo "No reply yet!";
                }
                ?>
                    <hr>
                    <?php
                if(isset($_SESSION["user"])){
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <textarea name="comment" id="" placeholder="Enter your comment here"  cols="30" rows="2"
                                class="form-control" required> 
                            </textarea>
                        </div>
                        <div class="mt-2">
                            <button type="submit" name="comment_new" class="btn-danger btn-sm text-white"
                                >
                                Reply</button>
                        </div>
                    </form>
                    <?php
                }else{
                    ?>
                    <a href="login.php">Login to comment</a>
                    <?php
                }  
                ?>
                </div>
            </div>
            
        </div>
    </div>
    <?php require './pages/footer-home.php'; ?>
</div>



<?php
 require "inc/footer.php"; 
 
 
 ?>