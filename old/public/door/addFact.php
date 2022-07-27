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
                            <h2>Add Fact</h2>
                            <form action="../CONTROLLERS/addFact.php" method="POST" enctype="multipart/form-data" class="well-lg form-inline " id="signupForm"  >
                                <fieldset>
                                    <section class="input-group-lg has-success " >
                                       <textarea name="fact" placeholder="Fact Description" style="border: 1px solid #c0c0c0" required class="input-lg col-xs-12 signupFormSpacer" title="Fact Description"   ></textarea>
                                    </section><br/>
                                    <button type="submit" class="btn-block btn-success btn-lg signupFormSpacer2 " name="submit">Add Fact</button>
                                </fieldset>
                            </form>
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
