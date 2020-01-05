<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="POST">                   
            <div class="input-group">
                <input type="text" name="search" class="form-control">
                <span class="input-group-btn">
                    <button type="submit" name="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
            </form><!-- Blog form -->
        <!-- /.input-group -->
    </div>

    <?php
        
        
    ?>
    <!-- Login -->
    <div class="well">
        <h4>Login</h4>
        <p class="error-msg-login-widget text-danger"></p>
        <form action="./includes/login.php" id="login-form" method="POST">                   
            <div class="form-group">
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                <span class="input-group-btn">
                    <button class="btn btn-primary" id="login-btn" type="submit" name="login">Submit</button>
                </span>
            </div>
            </form><!-- Blog form -->
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">

    <?php 
        // $query = "SELECT * FROM categories LIMIT 3";
        $query = "SELECT * FROM categories";
        $catResult = mysqli_query($connection, $query);
    ?>

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php 
                        while($row = mysqli_fetch_assoc($catResult)) {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            echo  "<li><a href='categories.php?categories=$cat_id'>{$cat_title}</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>