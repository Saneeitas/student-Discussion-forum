<?php  
session_start();

//check if user is not logged in
if(!isset($_SESSION["user"])){
    header("location: login.php");
}//check if logged in as user
// if($_SESSION["user"]["role"] == "user"){
//     header("location: index.php");
// }

//header links
 require "inc/header.php"; ?>

<div class="container">

    <?php
 //header content
 require './pages/header-home.php';
 include 'inc/process.php'; 
 ?>

    <div class="container p-3">
        <div class="row">
          
            <div class="col-9">
                <div class="container">
                    <h6>Create a Post</h6>
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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                         <div class="col-6">
                         <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" placeholder="Enter title" class="form-control" id="">
                        </div>
                         </div>
                         <div class="col-6">
                         <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="category_id" class="form-control" id="">
                                        <?php
                                         $sql = "SELECT * FROM category ORDER BY id DESC";
                                         $query = mysqli_query($connection,$sql);
                                         while($result = mysqli_fetch_assoc($query)){
                                             ?>
                                        <option value="<?php echo $result["id"] ?>">
                                            <?php echo $result["name"] ?>
                                        </option>
                                        <?php
                                         }
                                       ?>
                                    </select>
                                </div>
                         </div>
                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" id="" placeholder="Enter post content" cols="30" rows="10"
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="new_post" style="background-color:#d16943;"
                                class="btn btn-sm text-white my-2">
                                Post</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php  
//footer content
require './pages/footer-home.php';
//footer script
 require "inc/footer.php"; 
 ?>
</div>
</div>
