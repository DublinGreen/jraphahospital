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
                            <h2>Add Facility</h2>
                            <form action="../CONTROLLERS/addPackage.php" method="POST" enctype="multipart/form-data" class="well-lg form-inline " id="signupForm"  >
                                <fieldset>
                                    <p class="alert-warning">Note all images must be in jpeg format , so the image can be resized .Image Dimension is 500 * 500</p>
                                    <section class="input-group-lg has-success " >
                                        <input class="input-lg col-xs-12 signupFormSpacer " spellcheck="true"  title="Facility Name" name="name" type="text" placeholder="Facility Name" required  />
                                    </section>
                                    <section class="input-group-lg has-error">
                                        <span class="alert-warning"></p>Break line with &lt;br/&gt; </p></span>
                                        <textarea name="description" placeholder="Package Description" style="border: 1px solid #c0c0c0" required class="input-lg col-xs-12 signupFormSpacer" title="Package Description"   ></textarea>
                                    </section>
                                        <label>Main Image<input type="file" name="image" value="" /></label>
                                         <label>Image 2<input type="file" name="image2" value="" /></label>
                                         <label>Image 3<input type="file" name="image3" value="" /></label>
                                         <label>Image 4<input type="file" name="image4" value="" /></label>
                                         <label>Image 5<input type="file" name="image5" value="" /></label>
                                    <button type="submit" class="btn-block btn-success btn-lg signupFormSpacer2 " name="submit">Submit</button>
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
