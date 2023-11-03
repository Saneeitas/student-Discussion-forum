<?php  
//header links
 require "inc/header.php"; ?>

<div class="container">

    <?php
 //header content
 include 'inc/process.php'; ?>

<div class="col-12">
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
    <label for="name">
         Name
    </label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text py-3"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="name" class="form-control" placeholder="Enter your name" id="name" required>
    </div>
</div>
<div class="form-group">
    <label for="email">
        Email
    </label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text py-3"><i class="fas fa-envelope"></i></span>
        </div>
        <input type="text" name="email" class="form-control" placeholder="Enter your email" id="email" required>
    </div>
</div>
<div class="form-group">
    <label for="password">
        Password
    </label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text py-3"><i class="fas fa-lock"></i></span>
        </div>
        <input type="password" name="password" class="form-control" placeholder="Enter password" id="password" required>
    </div>
</div>
<button type="submit" name="register" class="btn btn-danger btn-lg my-3">
    <i class="fas fa-user-plus"></i> Register
</button>
<br>
<p>If already registered <a href="login.php">Login</a></p>


        </form>

    </div>



    <?php  
//footer content
require './pages/footer-home.php'; ?>

</div>


<?php
 //footer script
  require "inc/footer.php";  ?>