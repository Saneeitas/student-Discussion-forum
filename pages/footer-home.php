<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0" style="color: #176B87">&copy; 2023 Student Discussion Forum</p>

        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap" />
            </svg>
        </a>

    <ul class="nav col-md-4 justify-content-end">
    <li class="nav-item">
        <a href="forum.php" class="btn btn-sm btn-primary "><i class="fas fa-sign-in-alt"></i> Back </a>
    </li>
    <?php
    if (isset($_SESSION['user'])) {
        echo '<li class="nav-item"><a href="logout.php" class="btn btn-sm btn-danger px-2"><i class="fas fa-sign-in-alt"></i> Logout</a></li>';
    }
    ?>
</ul>

        
    </footer>
</div>