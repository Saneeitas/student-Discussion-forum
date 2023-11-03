
<div class="container mt-5 text-center">
   <i class="fas fa-graduation-cap fa-4x text-danger mb-3"></i> <!-- Student Discussion Icon -->
   <h4 class="display-4">Student Discussion Forum</h4>
   <p class="lead">Unlocking Knowledge, Igniting Conversations: Join the Student Discourse!</p>
   <a href="login.php" class="btn btn-danger btn-lg">Get Started</a>
</div>


<nav class="navbar rounded navbar-light " >
    <div class=" container-fluid">
        <a class="navbar-brand text-light" href="index.php">
            <h4> <i class="fas fa-bars"></i> </h4>
        </a>
        <div class="d-flex">
            <?php 
        if(isset($_SESSION["user"])){
          ?>
            <a href="logout.php" class="nav-link text-danger"> 
                <i class="fas fa-sign-out-alt"></i> Logout</a>
            <?php
        }
        
      ?>
        </div>
    </div>
</nav>