<?php

session_start();

 require "inc/process.php";
 require "inc/header.php";   
 // require "body.php"; 

 ?>
<div class="container">
   
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
            <div class="container mt-5 text-center">
            <i class="fas fa-graduation-cap fa-4x text-danger mb-3"></i> <!-- Student Discussion Icon -->
            <h4 class="display-4">Student Discussion Forum</h4>
            <p class="lead">Unlocking Knowledge, Igniting Conversations: Join the Student Discourse!</p>
            </div>
            <hr>
               
                <div class="d-flex aligns-items-center justify-content-center py-3">
        <form action="" method="post">
            <div class="form-group">
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
            </div>

            <div class="form-group">
    <label for="email">Email</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text py-3"><i class="fas fa-envelope"></i></span>
        </div>
        <input type="text" name="email" class="form-control" placeholder="Enter your email" id="email" required>
    </div>
</div>
<div class="form-group">
    <label for="password">Password</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text py-3"><i class="fas fa-lock"></i></span>
        </div>
        <input type="password" name="password" class="form-control" placeholder="Enter password" id="password" required>
    </div>
</div>
<button type="submit" name="login" class="btn btn-danger btn-lg my-3">
    <i class="fas fa-sign-in-alt"></i> Login
</button>

            <br>
            <p>If not registered <a href="register.php">Signup</a></p>

        </form>

    </div>
            </div>
            
            
        </div>
        
    </div>
    <?php require './pages/footer-home.php'; ?>
</div>

 <?php 
 require "inc/footer.php"; 
 ?>
