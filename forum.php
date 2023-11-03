<?php

session_start();

 require "inc/process.php";
 require "inc/header.php";   
 // require "body.php"; 

 if(!isset($_SESSION["user"])){
    header("location: index.php");
}

 ?>
<div class="container">
<div class="container mt-5 text-center">
            <i class="fas fa-graduation-cap fa-4x text-danger mb-3"></i> <!-- Student Discussion Icon -->
            <h4 class="display-4">Student Discussion Forum</h4>
            <p class="lead">Unlocking Knowledge, Igniting Conversations: Join the Student Discourse!</p>
            </div>
            <hr>
    <div class="container-fluid my-3 ">
        <div class="row">
            <div class="col-12">

                <div class="container">
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
<div class="container">
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        
        <div class="form-group">
            <input type="text" name="title" class="form-control mb-3" placeholder="Title" required style="width: 50%;">
            <textarea name="content" placeholder="Enter your question" class="form-control mb-3" rows="3" required style="width: 50%;"></textarea>
            <div class="row">
                <div class="col-6 text-left">
                    <button type="submit" name="new_question" class="btn btn-danger my-2">
                        <i class="fas fa-question"></i> Ask a Question
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
            </div>
            <hr>
            <div class="row">
                    <?php
              //displ+aying the posts from database
              $sql = "SELECT * FROM posts ORDER BY id DESC";
              $query = mysqli_query($connection,$sql);
               while($result = mysqli_fetch_assoc($query)) { 
                //Looping through the col for multiples post
                ?>
                   <div class="col-4 mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">#<?php echo $result["title"]; ?></h5>
            <p class="card-text">
                <?php 
                    $content = $result["content"];
                    $shortContent = substr($content, 0, 70); // Shorten the content to the desired length (e.g., 70 characters)
                    echo $shortContent;
                ?>...
            </p>
            <a href="read-question.php?question_id=<?php echo $result["id"]; ?>" class="btn btn-danger">View Question</a>
        </div>
    </div>
</div>

                    <?php
            }
          ?>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-8">
                
            </div>
          
        </div>
    </div>
    <?php require './pages/footer-home.php'; ?>
</div>

 <?php 
 require "inc/footer.php"; 
 ?>
