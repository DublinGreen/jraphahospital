<?php require_once '../../MODELS/initialize.php'; ?>
<?php Utility::police("index.php?login=3") ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'layout/header.php'; ?>
    <body>
        <?php require_once 'layout/topNav.php'; ?>
        <div class="container">
            <?php require_once 'layout/viewProfileModal.php'; ?>
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-12 col-sm-9">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                    </p>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <h2>Delete Package</h2><br/>
                           <?php
                                $showPackage = new MySql();
                                if($query = $showPackage->query("SELECT id , name , image FROM packages ORDER BY id")){
                                    while($resultSet = $showPackage->fetch($query)){
                                        echo("{$resultSet['name']}<br/><br/>
                                                <img src='../CONTROLLERS/savedPackageImages/_sml{$resultSet['image']}' alt='Package Image' width='300' /><br/><br/>
                                        <a href='../CONTROLLERS/deletePackage.php?delete={$resultSet['id']}' class='btn btn-danger'>Delete Package</a>    
                                        <hr>");
                                    }
                                }
                           ?>
                        </div><!--/span-->
                    </div><!--/row-->
                </div><!--/span-->
                <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                    <?php require_once 'layout/sidenav.php'; ?>
                </div><!--/span-->
            </div><!--/row-->

            <hr>
<?php require_once 'layout/footer.php'; ?>
        </div><!--/.container-->

        <?php
        if (isset($_GET['rank']) && $_GET['rank'] == 0) {
            echo("
                    <script>
                        alert('Sorry but you do not have priviledges to view that page.');
                    </script>
                        ");
        }
        ?>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../VIEWS/asserts/b1229/assets/js/jquery.js"></script>
        <script src="../VIEWS/asserts/b1229/dist/js/bootstrap.min.js"></script>
        <script src="js/offcanvas.js"></script>
    </body>
</html>
