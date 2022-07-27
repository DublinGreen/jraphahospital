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
                            <h2>Delete Exciting Location</h2>
                            <?php
                            $showLocation = new MySql();
                            if ($query = $showLocation->query("SELECT * FROM vacancy ORDER BY id")) {
                                while ($resultSet = $showLocation->fetch($query)) {
                                    echo("<p><strong>Description : </strong> {$resultSet['description']}</p>
                                            <p><strong>Requirements : </strong>{$resultSet['requirements']}</p>
                                            <p><strong>End Date : </strong>{$resultSet['end_date']}</p>
                                            <p><strong>Time Added : </strong>{$resultSet['time_created']}</p>
                                        <a href='../CONTROLLERS/deleteVacancy.php?delete={$resultSet['id']}' class='btn btn-danger'>Delete Vacancy</a>    
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
